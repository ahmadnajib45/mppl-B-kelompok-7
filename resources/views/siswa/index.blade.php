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
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <a href="{{ route('siswa.create') }}">+ Tambah Siswa</a>
    <table class="w-full mt-4 bg-white rounded shadow" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>NIS</th>
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
                <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-info btn-sm">Lihat</a>
                @Auth
                @if (Auth::user()->role == 'admin')
                <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline">
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
