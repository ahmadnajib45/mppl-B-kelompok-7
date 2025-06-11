<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Daftar User</h2>
    </x-slot>

    <div class="py-4 px-6">
        <div class="container">
    <h2>Tambah Data Guru</h2>
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
    <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Foto --}}
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>

        {{-- NIP --}}
        <div class="mb-3">
            <label for="nip" class="form-label">NIP (Kosongkan jika Non-PNS)</label>
            <input type="text" class="form-control" name="nip" id="nip">
        </div>

        {{-- NUPTK --}}
        <div class="mb-3">
            <label for="nuptk" class="form-label">NUPTK</label>
            <input type="text" class="form-control" name="nuptk" id="nuptk" required>
        </div>

        {{-- Nama Lengkap --}}
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required>
        </div>

        {{-- Mata Pelajaran --}}
        <div class="mb-3">
            <label for="mapel" class="form-label">Mata Pelajaran</label>
            <input type="text" class="form-control" name="mapel" id="mapel" required>
        </div>

        {{-- Status Kepegawaian --}}
        <div class="mb-3">
            <label for="status_kepegawaian" class="form-label">Status Kepegawaian</label>
            <select class="form-control" name="status_kepegawaian" id="status_kepegawaian" required>
                <option value="">Pilih Status</option>
                <option value="PNS">PNS</option>
                <option value="Non-PNS">Non-PNS</option>
            </select>
        </div>

        {{-- Jabatan --}}
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" required>
        </div>

        {{-- Jenis Kelamin --}}
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        {{-- Agama --}}
        <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <input type="text" class="form-control" name="agama" id="agama" required>
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        {{-- Telepon --}}
        <div class="mb-3">
            <label for="telepon" class="form-label">No. Telepon</label>
            <input type="text" class="form-control" name="telepon" id="telepon" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
    </div>
</x-app-layout>
