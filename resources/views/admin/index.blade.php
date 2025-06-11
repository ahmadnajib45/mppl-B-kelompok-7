
    @extends('layouts.public')

    @section('content')

    <div class="min-h-screen bg-green-50 flex flex-col items-center px-4 py-10">

    {{-- Header --}}
    <div class="w-full max-w-6xl flex flex-col md:flex-row items-center justify-between mb-10">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16">
            <h1 class="text-2xl md:text-3xl font-bold text-green-700">
                Admin Panel <span class="text-gray-700">Ksatria</span><span class="italic text-green-600">Nusantara</span>
            </h1>
        </div>
    </div>

    {{-- Grid Menu --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-6xl">

        {{-- Fitur Aktif --}}
        <a href="{{ route('dashboard') }}"
           class="bg-white border-l-8 border-green-600 shadow-md p-6 rounded-xl hover:shadow-lg hover:-translate-y-1 transition duration-200 ease-in-out">
            <h2 class="text-xl font-bold text-green-700 mb-2">Manajemen Data Sekolah</h2>
            <p class="text-gray-600">Kelola data guru, siswa, kelas, dan lainnya.</p>
        </a>
        <a href="{{ route('user.index') }}"
           class="bg-white border-l-8 border-green-600 shadow-md p-6 rounded-xl hover:shadow-lg hover:-translate-y-1 transition duration-200 ease-in-out">
            <h2 class="text-xl font-bold text-green-700 mb-2">Kelola User</h2>
            <p class="text-gray-600">Kelola User Aplikasi.</p>
        </a>

        {{-- Fitur Nonaktif (Dummy) --}}
        @foreach (['Input Nilai Rapor', 'Absensi Siswa', 'Jadwal Pelajaran', 'Rekap Data Siswa'] as $fitur)
        <div class="bg-gray-200 border-l-8 border-gray-400 p-6 rounded-xl opacity-60 cursor-not-allowed shadow-inner">
            <h2 class="text-xl font-semibold text-gray-500 mb-2">{{ $fitur }}</h2>
            <p class="text-gray-500">Fitur ini belum tersedia.</p>
        </div>

        @endforeach

    </div>

    {{-- Footer Optional --}}
    <div class="mt-16 text-sm text-gray-500">
        &copy; {{ date('Y') }} SMA Ksatria Nusantara - Admin Panel
    </div>

</div>
  @endsection
