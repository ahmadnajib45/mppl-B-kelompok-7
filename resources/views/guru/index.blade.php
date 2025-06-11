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
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <a href="{{ route('guru.create') }}">+ Tambah Guru</a>
    <table class="w-full mt-4 bg-white rounded shadow" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>NIP</th>
            <th>NUPTK</th>
            <th>Nama</th>
            <th>Mapel</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
        @foreach ($gurus as $guru)
        <tr>
            <td>{{ $guru->nip }}</td>
            <td>{{ $guru->nuptk }}</td>
            <td>{{ $guru->nama_lengkap }}</td>
            <td>{{ $guru->mapel }}</td>
            <td>{{ $guru->email }}</td>
            <td>{{ $guru->telepon }}</td>
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
