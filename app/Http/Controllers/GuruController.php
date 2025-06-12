<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $query = Guru::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('nama_lengkap', 'like', "%{$search}%")
              ->orWhere('nip', 'like', "%{$search}%")
              ->orWhere('nuptk', 'like', "%{$search}%")
              ->orWhere('mapel', 'like', "%{$search}%")
              ->orWhere('status_kepegawaian', 'like', "%{$search}%")
              ->orWhere('jabatan', 'like', "%{$search}%");
    }

    $gurus = $query->get();

    return view('guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
        'nip' => 'nullable|unique:gurus',
        'nuptk' => 'required|unique:gurus',
        'nama_lengkap' => 'required',
        'mapel' => 'required',
        'status_kepegawaian' => 'required|in:PNS,NON',
        'jabatan' => 'required',
        'jenis_kelamin' => 'required|in:L,P',
        'agama' => 'required',
        'alamat' => 'required',
        'email' => 'required|email|unique:gurus|unique:users,email',
        'telepon' => 'required',
    ]);

        $foto = null;
        if ($request->hasFile('foto')) {
        $foto = $request->file('foto')->store('foto-guru', 'public');
        }

    // Simpan data guru
    $guru = Guru::create([
        'foto' => $foto,
        'nip' => $request->nip,
        'nuptk' => $request->nuptk,
        'nama_lengkap' => $request->nama_lengkap,
        'mapel' => $request->mapel,
        'status_kepegawaian' => $request->status_kepegawaian,
        'jabatan' => $request->jabatan,
        'jenis_kelamin' => $request->jenis_kelamin,
        'agama' => $request->agama,
        'alamat' => $request->alamat,
        'email' => $request->email,
        'telepon' => $request->telepon,
    ]);

    // Buat user login otomatis
    $password = Str::random(8);
    User::create([
        'name' => $guru->nama_lengkap,
        'email' => $guru->email,
        'password' => Hash::make($password),
        'role' => 'guru',
    ]);

return redirect()->route('guru.index')
    ->with('success', 'Guru & user berhasil dibuat. Password: ' . $password);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        if (auth()->user()->role !== 'admin' && auth()->user()->email !== $guru->email) {
            abort(403, 'Akses ditolak.');
        }
        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        if (auth()->user()->role !== 'admin' && auth()->user()->email !== $guru->email) {
        abort(403, 'Akses ditolak.');
    }
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        if (auth()->user()->role !== 'admin' && auth()->user()->email !== $guru->email) {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
        'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
        'nip' => 'nullable|unique:gurus,nip,' . $guru->id,
        'nuptk' => 'required|unique:gurus,nuptk,' . $guru->id,
        'nama_lengkap' => 'required',
        'mapel' => 'required',
        'status_kepegawaian' => 'required|in:PNS,NON',
        'jabatan' => 'required',
        'jenis_kelamin' => 'required|in:L,P',
        'agama' => 'required',
        'alamat' => 'required',
        'email' => 'required|email|unique:gurus,email,' . $guru->id . '|unique:users,email,' . $guru->id,
        'telepon' => 'required',
    ]);

        $guru->update($request->all());

        // Optional: update email di tabel users jika sudah pernah dibuat
        $user = User::where('email', $guru->email)->first();
        if ($user) {
            $user->update([
                'name' => $guru->nama_lengkap,
                'email' => $guru->email,
            ]);
}

        return redirect()->route('guru.index')
        ->with('success', 'Guru & user berhasil dibuat.');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}



