<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Daftar Siswa
        </h2>
    </x-slot>
@if (session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
@endif
@if($siswas->isEmpty())
    <div class="alert alert-danger">
    <tr>
        <td colspan="7" class="text-center text-gray-500 py-4">Pencarian Siswa tidak ditemukan.</td>
    </tr>
    </div>
@endif
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-4">Kembali</a>
    <div class="mb-4">
    <form method="GET" action="{{ route('siswa.index') }}">
        <input type="text" name="search" placeholder="Cari siswa..." value="{{ request('search') }}"
            class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-400 w-1/3">
        <button type="submit"
            class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Cari</button>
    </form>
    </div>
    @Auth
    @if (Auth::user()->role == 'admin')
    <a href="{{ route('siswa.create') }}">+ Tambah Siswa</a>
    @endif
    @endauth
    <table class="w-full mt-4 bg-white rounded shadow" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>NISN</th>
            <th>Kelas</th>
            <th>Nama Wali</th>
            <th>No HP Wali</th>
            <th>Aksi</th>
        </tr>
        @foreach ($siswas as $siswa)
        <tr>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama_lengkap }}</td>
            <td>{{ $siswa->nisn }}</td>
            <td>{{ $siswa->kelas }}</td>
            <td>{{ $siswa->nama_ayah }}</td>
            <td>{{ $siswa->telepon_ayah }}</td>
            <td>
                @php
                    $user = Auth::user();
                    preg_match('/^\d+/', $user->email, $matches);
                    $username = $matches[0] ?? null;
                @endphp

                @if (in_array($user->role, ['admin', 'guru']) || $username == $siswa->nis)
                    <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-info btn-sm">Lihat</a>
                @endif

                @auth
                    @if ($user->role == 'admin')
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    @endif
                @endauth
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
</x-app-layout>
