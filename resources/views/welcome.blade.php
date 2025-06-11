<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ksatria Nusantara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="font-sans antialiased">

    <nav x-data="{ open: false }" class="bg-green-600 text-white px-6 py-4">
    <div class="flex items-center justify-between">
        <!-- Logo dan Brand -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-12 object-contain">
            <span class="text-xl font-bold">
                <span class="text-white">Ksatria</span><span class="italic text-lime-200">Nusantara.</span>
            </span>
        </div>

        <!-- Tombol Hamburger (Mobile) -->
        <div class="md:hidden">
            <button @click="open = !open" class="text-white focus:outline-none">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Menu (Desktop) -->
        <div class="hidden md:flex space-x-6 text-white font-medium">
            <a href="#" class="hover:underline">Home</a>
            <a href="#tentang" class="hover:underline">Tentang Kami</a>
            <a href="#kontak" class="hover:underline">Kontak</a>
            <a href="{{ route('admin.index') }}" class="hover:underline">Admin site</a>
            <a href="#" class="hover:underline">OSIS site</a>
        </div>
    </div>

    <!-- Menu (Mobile) -->
    <div x-show="open" class="mt-4 md:hidden flex flex-col space-y-3 text-white font-medium">
        <a href="#" class="hover:underline">Home</a>
        <a href="#tentang" class="hover:underline">Tentang Kami</a>
        <a href="#kontak" class="hover:underline">Kontak</a>
        <a href="{{ route('admin.index') }}" class="hover:underline">Admin site</a>
        <a href="#" class="hover:underline">OSIS site</a>
    </div>
</nav>

    <!-- Hero Section -->
    <section class="relative h-[80vh] bg-cover bg-center flex items-center text-white px-8"
             style="background-image: url('/images/bg-ksatria.png');">
        <div class="max-w-2xl space-y-4">
            <h1 class="text-4xl font-bold italic"><span class="font-extrabold">SMA KSATRIA </span><span class="text-red-200">NUSANTARA</span></h1>
            <p class="text-lg">
                Adalah sekolah yang memadukan antara sekolah berideologi pancasila dengan kurikulum pesantren,
                sekolah ini di dirikan pada tahun 2017 dan terakreditasi A.
            </p>
            <a href="#tentang" class="inline-block bg-white text-green-700 font-bold italic px-5 py-2 rounded-full shadow hover:bg-gray-100 transition">
                Kepoin Yukk.!
            </a>
        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section id="tentang" class="bg-neutral-900 text-white py-16 px-8">
        <h2 class="text-3xl font-extrabold text-green-500 italic mb-4">TentangKami.</h2>
        <p class="max-w-3xl">
            SMA Ksatria Nusantara adalah lembaga pendidikan yang tidak hanya fokus pada akademik,
            tetapi juga pada pembentukan karakter dan nilai-nilai ideologi Pancasila serta keagamaan.
        </p>
    </section>

</body>
</html>
