<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-white font-semibold text-xl leading-tight">
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

    <div class="p-4 bg-[#3A3434] min-h-screen">
        <div class="bg-[#D9D9D9] rounded-xl p-4 relative">
            <div class="absolute top-4 left-4 ">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm mb-4">Kembali</a>

            </div>
            {{-- Search --}}
            <div class="absolute top-4 right-4">
                <form method="GET" action="{{ route('guru.index') }}">
                <input type="text" name="search" placeholder="Cari guru..." value="{{ request('search') }}" class="rounded-full px-4 py-1 text-sm" />
                <button type="submit"
            class="absolute top-1 right-2">🔍</button>
            </form>
            </div>

            {{-- Tabel --}}
            <table class="w-full text-left text-sm mt-8">
                <thead>
                    <tr class="text-red-800 font-bold border-b border-black">
                        <th class="py-2">NIP</th>
                        <th class="py-2">NUPTK</th>
                        <th class="py-2">Nama</th>
                        <th class="py-2">Mapel</th>
                        <th class="py-2">Jabatan</th>
                        <th class="py-2">Status</th>
                        <th class="py-2 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gurus as $guru)
                        <tr class="border-b border-gray-400">
                            <td class="py-1">{{ $guru->nip }}</td>
                            <td class="py-1">{{ $guru->nuptk }}</td>
                            <td class="py-1">{{ $guru->nama_lengkap }}</td>
                            <td class="py-1">{{ $guru->mapel }}</td>
                            <td class="py-1">{{ $guru->jabatan }}</td>
                            <td class="py-1">{{ $guru->status_kepegawaian }}</td>
                            <td class="py-1 text-right space-x-2">

                            @Auth
                            @if (Auth::user()->role == 'admin' or Auth::user()->email == $guru->email)
                                <a href="{{ route('guru.show', $guru->id) }}" class="text-blue-500 hover:text-green-600">👁️</a>
                                <a href="{{ route('guru.edit', $guru->id) }}" class="text-blue-500 hover:text-blue-700">✎</a>
                            @endif
                            @if (Auth::user()->role == 'admin')
                                <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:text-red-800">🗑</button>
                                </form>
                            @endif
                            @endauth
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="py-2 text-center text-gray-600">Data belum tersedia</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Tombol Tambah --}}
            @Auth
            @if (Auth::user()->role == 'admin')
            <div class="flex justify-end mt-4">
                <a href="{{ route('guru.create') }}" class="text-2xl text-black hover:text-gray-700">➕</a>
            </div>
            @endif
            @endauth
        </div>
    </div>
</x-app-layout>
