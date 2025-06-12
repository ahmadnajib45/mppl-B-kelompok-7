<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah User
        </h2>
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada masalah saat input:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <a href="{{ route('user.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    <div class="py-12">
        <div class="max-w-xl mx-auto">
            <form action="{{ route('user.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block font-medium">Nama</label>
                    <input type="text" name="name" class="w-full rounded border-gray-300" required>
                </div>

                <div>
                    <label class="block font-medium">Email</label>
                    <input type="email" name="email" class="w-full rounded border-gray-300" required>
                </div>

                <div>
                    <label class="block font-medium">Password</label>
                    <input type="password" name="password" class="w-full rounded border-gray-300" required>
                </div>

                <div>
                    <label class="block font-medium">Role</label>
                    <select name="role" class="w-full rounded border-gray-300" required>
                        <option value="admin">Admin</option>
                        <option value="guru">Guru</option>
                        <option value="murid">Murid</option>
                    </select>
                </div>

                <div>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
