<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Site - Ksatria Nusantara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-green-50">
    <nav x-data="{ open: false }" class="bg-[#44a474] text-white shadow border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-12 rounded-full bg-white p-1">
                    <h1 class="text-xl font-bold">
                        <a href="{{ route('welcome') }}">Ksatria <span class="italic text-lime-200">Nusantara.</span></a>
                    </h1>
                </div>
            </div>

            @auth
                <!-- Dropdown untuk user yang sudah login -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class=" inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div><span class="text-lg font-semibold">Halo, {{ Auth::user()->name ?? 'Admin' }}</span></div>
                                <div class="bg-[#65D084] p-1 rounded-full ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M5.121 17.804A4 4 0 017.72 16h8.56a4 4 0 012.598 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <!-- Tombol login untuk user belum login -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <a href="{{ route('login') }}"
                       class="inline-block px-5 py-1.5 bg-white text-gray-700 border border-gray-300 hover:border-gray-400 rounded-md text-sm leading-normal shadow-sm transition">
                        Log in
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>

    @yield('content')
</body>
</html>
