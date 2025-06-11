<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Tambah Siswa</h2>
    </x-slot>

    <div class="py-4 px-6">
        <div class="container">
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

    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <div class="mb-3">
            <label>NISN</label>
            <input type="text" name="nisn" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Agama</label>
            <input type="text" name="agama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-Laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Nama Ayah</label>
            <input type="text" name="nama_ayah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama Ibu</label>
            <input type="text" name="nama_ibu" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Telepon Ayah</label>
            <input type="text" name="telepon_ayah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Telepon Ibu</label>
            <input type="text" name="telepon_ibu" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat Orang Tua</label>
            <textarea name="alamat_ortu" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
    </div>
    </div>
</x-app-layout>
