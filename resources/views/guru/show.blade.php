<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-white text-xl leading-tight">Detail Guru</h2>
    </x-slot>

    <div class="p-6 bg-[#3A3434]  min-h-screen">
         {{-- Tombol Navigasi --}}
            <div class="flex justify-between mb-4">
                <a href="{{ route('guru.index') }}" class="bg-gray-800 text-white px-4 py-1 rounded hover:bg-gray-600">← Kembali</a>
                <a href="{{ route('guru.export.pdf', $guru->id) }}" class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700">Export PDF</a>
            </div>
        <div class="bg-[#D9D9D9] p-6 rounded-xl shadow-md max-w-4xl mx-auto">

            {{-- Header Nama & NUPTK --}}
            <div class="text-center mb-4">
                <h1 class="text-2xl font-bold">{{ $guru->nama_lengkap }}</h1>
                <p class="text-red-800 font-semibold text-lg">NUPTK : {{ $guru->nuptk }}</p>
            </div>

            {{-- Konten Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Foto Guru --}}
                <div class="flex justify-center">
                    @if($guru->foto)
                        <img src="{{ asset('storage/' . $guru->foto) }}" class="rounded-xl shadow w-60 h-auto object-cover" alt="Foto Siswa">
                    @else
                        <div class="w-60 h-80 bg-gray-400 rounded-xl flex items-center justify-center text-white">Tidak Ada Foto</div>
                    @endif
                </div>

                {{-- Data --}}
                <div class="md:col-span-2 text-red-800 font-semibold space-y-2">
                    <div class="flex justify-between">
                        <span>NIP</span><span> {{ $guru->nip }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Mapel</span><span> {{ $guru->mapel }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Status</span><span> {{ $guru->status_kepegawaian == 'PNS' ? 'PNS' : 'Non-PNS'  }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Jabatan</span><span> {{ $guru->jabatan }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Jenis Kelamin</span><span> {{ $guru->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'  }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Agama</span><span> {{ $guru->agama }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Alamat</span><span> {{ $guru->alamat }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Email</span><span> {{ $guru->email }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>No. HP</span><span> {{ $guru->telepon }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
