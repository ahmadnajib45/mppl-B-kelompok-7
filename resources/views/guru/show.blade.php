<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Daftar User</h2>
    </x-slot>

    <div class="py-4 px-6">
        <div class="container">
    <h2>Detail Guru</h2>
    <a href="{{ route('guru.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            @if($guru->foto)
                <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto Guru" width="150" class="mb-3">
            @endif

            <ul class="list-group">
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
</x-app-layout>
