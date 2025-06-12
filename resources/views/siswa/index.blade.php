<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-white font-semibold text-xl leading-tight">
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

    <div class="p-4 bg-[#3A3434] min-h-screen">
        <div class="bg-[#D9D9D9] rounded-xl p-4 relative">
            <div class="absolute top-4 left-4 ">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm mb-4">← Kembali</a>
                @auth
                @if (Auth::user()->role == 'admin' or Auth::user()->role == 'guru')
                <a href="{{ route('siswa.export.excel') }}" class="btn btn-success btn-sm mb-4">📤 Export Excel</a>
                @endif
                @endauth
            </div>
            {{-- Search --}}
            <div class="absolute top-4 right-4">
                <form method="GET" action="{{ route('siswa.index') }}">
                <input type="text" name="search" placeholder="Cari siswa..." value="{{ request('search') }}" class="rounded-full px-4 py-1 text-sm" />
                <button type="submit"
            class="absolute top-1 right-2">🔍</button>
            </form>
            </div>

            {{-- Tabel --}}
            <table class="w-full text-left text-sm mt-8">
                <thead>
                    <tr class="text-red-800 font-bold border-b border-black">
                        <th class="py-2">NIS</th>
                        <th class="py-2">NISN</th>
                        <th class="py-2">Nama</th>
                        <th class="py-2">Kelas</th>
                        <th class="py-2">Nama Wali</th>
                        <th class="py-2">No.HP</th>
                        <th class="py-2 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswas as $siswa)
                        <tr class="border-b border-gray-400">
                            <td class="py-1">{{ $siswa->nis }}</td>
                            <td class="py-1">{{ $siswa->nisn }}</td>
                            <td class="py-1">{{ $siswa->nama_lengkap }}</td>
                            <td class="py-1">{{ $siswa->kelas }}</td>
                            <td class="py-1">{{ $siswa->nama_ayah }}</td>
                            <td class="py-1">{{ $siswa->telepon_ayah }}</td>
                            <td class="py-1 text-right space-x-2">
                                @php
                                    $user = Auth::user();
                                    preg_match('/^\d+/', $user->email, $matches);
                                    $username = $matches[0] ?? null;
                                @endphp

                                @if (in_array($user->role, ['admin', 'guru']) || $username == $siswa->nis)
                                    <a href="{{ route('siswa.show', $siswa->id) }}" class="text-blue-500 hover:text-green-600">👁️</a>
                                @endif

                                @auth
                                    @if ($user->role == 'admin')
                                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="text-blue-500 hover:text-blue-700">✎</a>
                                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline">
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
                <a href="{{ route('siswa.create') }}" class="text-2xl text-black hover:text-gray-700">➕</a>
            </div>
            @endif
            @endauth
        </div>
    </div>
</x-app-layout>
