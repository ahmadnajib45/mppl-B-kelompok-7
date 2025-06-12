<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-white text-xl leading-tight">Detail Siswa</h2>
    </x-slot>

    <div class="p-6 bg-[#3A3434]  min-h-screen">
         {{-- Tombol Navigasi --}}
            <div class="flex justify-between mb-4">
                <a href="{{ route('siswa.index') }}" class="bg-gray-800 text-white px-4 py-1 rounded hover:bg-gray-600">← Kembali</a>
                <a href="{{ route('siswa.export.pdf', $siswa->id) }}" class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700">Export PDF</a>
            </div>
        <div class="bg-[#D9D9D9] p-6 rounded-xl shadow-md max-w-4xl mx-auto">

            {{-- Header Nama & NIS --}}
            <div class="text-center mb-4">
                <h1 class="text-2xl font-bold">{{ $siswa->nama_lengkap }}</h1>
                <p class="text-red-800 font-semibold text-lg">NIS : {{ $siswa->nis }}</p>
            </div>

            {{-- Konten Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Foto Siswa --}}
                <div class="flex justify-center">
                    @if($siswa->foto)
                        <img src="{{ asset('storage/' . $siswa->foto) }}" class="rounded-xl shadow w-60 h-auto object-cover" alt="Foto Siswa">
                    @else
                        <div class="w-60 h-80 bg-gray-400 rounded-xl flex items-center justify-center text-white">Tidak Ada Foto</div>
                    @endif
                </div>

                {{-- Data --}}
                <div class="md:col-span-2 text-red-800 font-semibold space-y-2">
                    <div class="flex justify-between">
                        <span>NISN</span><span> {{ $siswa->nisn }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Kelas</span><span> {{ $siswa->kelas }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Agama</span><span> {{ $siswa->agama }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Jenis Kelamin</span><span> {{ $siswa->jenis_kelamin }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Alamat</span><span> {{ $siswa->alamat }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Nama Ayah</span><span> {{ $siswa->nama_ayah }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Nama Ibu</span><span> {{ $siswa->nama_ibu }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>No. HP Ayah</span><span> {{ $siswa->telepon_ibu }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>No. HP Ibu</span><span> {{ $siswa->telepon_ayah }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
