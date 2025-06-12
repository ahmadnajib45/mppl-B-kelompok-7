<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-white font-semibold text-xl leading-tight">Edit Siswa</h2>
    </x-slot>

    <div class="bg-[#D9D9D9] py-4 px-6">
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
    <a href="{{ route('siswa.index') }}" class="btn btn-secondary mb-2">Kembali</a>
    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="mb-3">
            <label>NISN</label>
            <input type="text" name="nisn" class="form-control" value="{{$siswa->nisn }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{$siswa->nama_lengkap }}" required>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" value="{{$siswa->kelas }}"required>
        </div>

        <div class="mb-3">
            <label>Agama</label>
            <input type="text" name="agama" class="form-control" value="{{$siswa->agama }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ old('alamat', $siswa->alamat) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Nama Ayah</label>
            <input type="text" name="nama_ayah" class="form-control" value="{{$siswa->nama_ayah }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Ibu</label>
            <input type="text" name="nama_ibu" class="form-control" value="{{$siswa->nama_ibu }}" required>
        </div>

        <div class="mb-3">
            <label>Telepon Ayah</label>
            <input type="text" name="telepon_ayah" class="form-control" value="{{$siswa->telepon_ayah }}" required>
        </div>

        <div class="mb-3">
            <label>Telepon Ibu</label>
            <input type="text" name="telepon_ibu" class="form-control" value="{{$siswa->telepon_ibu }}" required>
        </div>

        <div class="mb-3">
            <label>Alamat Orang Tua</label>
            <textarea name="alamat_ortu" class="form-control" required>{{ old('alamat_ortu', $siswa->alamat_ortu) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
    </div>
</div>

</x-app-layout>
