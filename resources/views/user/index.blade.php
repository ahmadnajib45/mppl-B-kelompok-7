<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Daftar User</h2>
    </x-slot>
@if (session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
@endif
    <div class=" py-4 px-6">
        <a href="{{ route('admin.index') }}" class="btn btn-secondary mb-4">Kembali</a>
        <a href="{{ route('user.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah User</a>

        <table class="w-full mt-4 bg-white rounded shadow">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2">Nama</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Role</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-t">
                        <td class="p-2">{{ $user->name }}</td>
                        <td class="p-2">{{ $user->email }}</td>
                        <td class="p-2 capitalize">{{ $user->role }}</td>
                        <td class="p-2">
                            <a href="{{ route('user.edit', $user->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="text-red-500 ml-2" onclick="return confirm('Hapus user ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
