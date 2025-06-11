<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Daftar User</h2>
    </x-slot>

    <div class="py-4 px-6">
        <div class="container">
            <h2>Detail Siswa</h2>

            <div class="card mb-3">
                <div class="row g-0">
                    @if($siswa->foto)
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $siswa->foto) }}" class="img-fluid rounded-start" alt="Foto Siswa">
                    </div>
                    @endif
                    <div class="col-md-8">
                        <div class="card-body">
                            <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
                            <p><strong>NISN:</strong> {{ $siswa->nisn }}</p>
                            <p><strong>Nama Lengkap:</strong> {{ $siswa->nama_lengkap }}</p>
                            <p><strong>Kelas:</strong> {{ $siswa->kelas }}</p>
                            <p><strong>Agama:</strong> {{ $siswa->agama }}</p>
                            <p><strong>Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin }}</p>
                            <p><strong>Alamat:</strong> {{ $siswa->alamat }}</p>
                            <p><strong>Nama Ayah:</strong> {{ $siswa->nama_ayah }}</p>
                            <p><strong>Nama Ibu:</strong> {{ $siswa->nama_ibu }}</p>
                            <p><strong>Telepon Ayah:</strong> {{ $siswa->telepon_ayah }}</p>
                            <p><strong>Telepon Ibu:</strong> {{ $siswa->telepon_ibu }}</p>
                            <p><strong>Alamat Orang Tua:</strong> {{ $siswa->alamat_ortu }}</p>
                            <a href="{{ route('siswa.index') }}" class="btn btn-secondary mt-2">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
