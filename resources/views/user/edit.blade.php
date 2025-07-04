<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Edit User</h2>
    </x-slot>

    <div class="py-4 px-6">
        <form action="{{ route('user.update', $user->id) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')

            <div>
                <label>Nama</label>
                <input type="text" name="name" value="{{ $user->name }}" class="w-full rounded border-gray-300" required>
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="w-full rounded border-gray-300" required>
            </div>

            <div>
                <label>Password (biarkan kosong jika tidak diganti)</label>
                <input type="password" name="password" class="w-full rounded border-gray-300">
            </div>

            <div>
                <label>Role</label>
                <select name="role" class="w-full rounded border-gray-300" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
                    <option value="murid" {{ $user->role == 'murid' ? 'selected' : '' }}>Murid</option>
                </select>
            </div>

            <div>
                <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
