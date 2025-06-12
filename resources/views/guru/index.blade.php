<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Daftar Guru
        </h2>
    </x-slot>
@if (session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
@endif
@if($gurus->isEmpty())
    <div class="alert alert-danger">
    <tr>
        <td colspan="7" class="text-center text-gray-500 py-4">Pencarian Guru tidak ditemukan.</td>
    </tr>
    </div>
@endif

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-4">Kembali</a>
    <div class="mb-4">
    <form method="GET" action="{{ route('guru.index') }}">
        <input type="text" name="search" placeholder="Cari guru..." value="{{ request('search') }}"
            class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-400 w-1/3">
        <button type="submit"
            class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Cari</button>
    </form>
    </div>
    @Auth
    @if (Auth::user()->role == 'admin')
    <a href="{{ route('guru.create') }}">+ Tambah Guru</a>
    @endif
    @endauth

    <table class="w-full mt-4 bg-white rounded shadow" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>NIP</th>
            <th>NUPTK</th>
            <th>Nama</th>
            <th>Mapel</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach ($gurus as $guru)
        <tr>
            <td>{{ $guru->nip }}</td>
            <td>{{ $guru->nuptk }}</td>
            <td>{{ $guru->nama_lengkap }}</td>
            <td>{{ $guru->mapel }}</td>
            <td>{{ $guru->jabatan }}</td>
            <td>{{ $guru->status_kepegawaian }}</td>
            <td>
                @Auth
                @if (Auth::user()->role == 'admin' or Auth::user()->email == $guru->email)
                <a href="{{ route('guru.show', $guru->id) }}" class="btn btn-info btn-sm">Lihat</a>
                <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning btn-sm">Edit</a>
                @endif
                @if (Auth::user()->role == 'admin')
                <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
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
