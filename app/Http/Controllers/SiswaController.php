<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
        'nisn' => 'required|unique:siswas|unique:users,email',
        'nama_lengkap' => 'required',
        'kelas' => 'required',
        'agama' => 'required',
        'jenis_kelamin' => 'required|in:L,P',
        'alamat' => 'required',
        'nama_ayah' => 'required',
        'nama_ibu' => 'required',
        'telepon_ayah' => 'required',
        'telepon_ibu' => 'required',
        'alamat_ortu' => 'required',
    ]);

    $fotoPath = null;
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('foto-siswa', 'public');
    }

    // Simpan awal dulu dengan NIS sementara
    $siswa = Siswa::create([
        'foto' => $fotoPath,
        'nis' => 'TEMP',
        'nisn' => $request->nisn,
        'nama_lengkap' => $request->nama_lengkap,
        'kelas' => $request->kelas,
        'agama' => $request->agama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'nama_ayah' => $request->nama_ayah,
        'nama_ibu' => $request->nama_ibu,
        'telepon_ayah' => $request->telepon_ayah,
        'telepon_ibu' => $request->telepon_ibu,
        'alamat_ortu' => $request->alamat_ortu,
    ]);

    // Generate NIS: tahun + 4 digit ID
    $year = Carbon::now()->format('y'); // e.g. 25
    $nis = $year . str_pad($siswa->id, 4, '0', STR_PAD_LEFT);

    // Format email siswa
    $email = $nis . '@student.gmail.com';

    // Update siswa
    $siswa->update([
        'nis' => $nis,
    ]);

    // Buat akun user otomatis
    $password = Str::random(8); // bisa juga 'siswa123' atau nis
    User::create([
        'name' => $siswa->nama_lengkap,
        'email' => $email,
        'password' => Hash::make($password),
        'role' => 'siswa',
    ]);

        return redirect()->route('siswa.index')
        ->with('success', 'Siswa & akun berhasil dibuat. Email: ' . $email . ', Password: ' . $password);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        
        return view('siswa.show', compact('siswa'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
            'nisn' => 'required|unique:siswas,nisn,' . $siswa->id,
            'nama_lengkap' => 'required',
            'kelas' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'telepon_ayah' => 'required',
            'telepon_ibu' => 'required',
            'alamat_ortu' => 'required',
        ]);

        $fotoPath = $siswa->foto;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto-siswa', 'public');
        }

        $siswa->update([
            'foto' => $fotoPath,
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'kelas' => $request->kelas,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'telepon_ayah' => $request->telepon_ayah,
            'telepon_ibu' => $request->telepon_ibu,
            'alamat_ortu' => $request->alamat_ortu,
        ]);

        return redirect()->route('siswa.index')
        ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')
        ->with('success', 'Siswa & akun berhasil dihapus.');
    }
    
}
