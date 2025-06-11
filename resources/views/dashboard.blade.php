<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            @auth
            @if (Auth::user()->role == 'admin')
            <div class="flex space-x-4">
                <a href="{{ route('user.index') }}"
                   class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded">
                    Daftar User
                </a>
            @endif
            @if (Auth::user()->role == 'admin' or Auth::user()->role == 'guru')
                <a href="{{ route('guru.index') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                    Daftar Guru
                </a>
            @endif
                <a href="{{ route('siswa.index') }}"
                   class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded">
                    Daftar Siswa
                </a>
            @endauth
            </div>
        </div>
    </div>
</x-app-layout>
