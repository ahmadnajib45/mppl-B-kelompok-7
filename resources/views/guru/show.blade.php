<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Daftar User</h2>
    </x-slot>

    <div class="py-4 px-6">
        <div class="container">
    <a href="{{ route('guru.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <a href="{{ route('guru.export.pdf', $guru->id) }}" class="btn btn-danger mb-3">Export PDF</a>

    <div class="card mb-3">
    <div class="row g-0">
    <div class="card">
        <div class="card-body">

            <ul class="list-group">
                <li class="list-group-item">@if($guru->foto)
         <div class="col-md-4">
                <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto Guru" width="200" class="mb-3">
            </div>
            @endif </li>
                <li class="list-group-item"><strong>NIP:</strong> {{ $guru->nip ?? '-' }}</li>
                <li class="list-group-item"><strong>NUPTK:</strong> {{ $guru->nuptk }}</li>
                <li class="list-group-item"><strong>Nama Lengkap:</strong> {{ $guru->nama_lengkap }}</li>
                <li class="list-group-item"><strong>Mata Pelajaran:</strong> {{ $guru->mapel }}</li>
                <li class="list-group-item"><strong>Status Kepegawaian:</strong> {{ $guru->status_kepegawaian }}</li>
                <li class="list-group-item"><strong>Jabatan:</strong> {{ $guru->jabatan }}</li>
                <li class="list-group-item"><strong>Jenis Kelamin:</strong> {{ $guru->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</li>
                <li class="list-group-item"><strong>Agama:</strong> {{ $guru->agama }}</li>
                <li class="list-group-item"><strong>Alamat:</strong> {{ $guru->alamat }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $guru->email }}</li>
                <li class="list-group-item"><strong>No. Telepon:</strong> {{ $guru->telepon }}</li>
            </ul>
        </div>
    </div>
</div>
</div>
</div>
</div>
</x-app-layout>
