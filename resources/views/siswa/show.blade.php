<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Detail Siswa</h2>
    </x-slot>

    <div class="py-4 px-6">
        <div class="container">
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary mb-2">Kembali</a>
            <a href="{{ route('siswa.export.pdf', $siswa->id) }}" class="btn btn-danger mb-2">Export PDF</a>

            <div class="card mb-3">
                <div class="row g-0">
                    <div class="card">
                        <div class="card-body">

                            <ul class="list-group">
                            <li class="list-group-item"> @if($siswa->foto)
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $siswa->foto) }}" class="img-fluid rounded-start" alt="Foto Siswa" width="200" class="mb-3">
                            </div>
                            @endif</li>
                            <li class="list-group-item"><strong>NIS:</strong> {{ $siswa->nis }}</li>
                            <li class="list-group-item"><strong>NISN:</strong> {{ $siswa->nisn }}</li>
                            <li class="list-group-item"><strong>Nama Lengkap:</strong> {{ $siswa->nama_lengkap }}</li>
                            <li class="list-group-item"><strong>Kelas:</strong> {{ $siswa->kelas }}</li>
                            <li class="list-group-item"><strong>Agama:</strong> {{ $siswa->agama }}</li>
                            <li class="list-group-item"><strong>Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin }}</li>
                            <li class="list-group-item"><strong>Alamat:</strong> {{ $siswa->alamat }}</li>
                            <li class="list-group-item"><strong>Nama Ayah:</strong> {{ $siswa->nama_ayah }}</li>
                            <li class="list-group-item"><strong>Nama Ibu:</strong> {{ $siswa->nama_ibu }}</li>
                            <li class="list-group-item"><strong>Telepon Ayah:</strong> {{ $siswa->telepon_ayah }}</li>
                            <li class="list-group-item"><strong>Telepon Ibu:</strong> {{ $siswa->telepon_ibu }}</li>
                            <li class="list-group-item"><strong>Alamat Orang Tua:</strong> {{ $siswa->alamat_ortu }}</li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
