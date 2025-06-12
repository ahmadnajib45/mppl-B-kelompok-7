<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Guru</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        .container {
            border: 1px solid #ccc;
            padding: 15px;
        }
        .foto {
            float: left;
            margin-right: 20px;
        }
        .info {
            overflow: hidden;
        }
        .info p {
            margin: 3px 0;
        }
        .label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Detail Guru</h2>
    <div class="container">
        <div class="foto">
            <img src="{{ public_path('storage/' . $guru->foto) }}" width="100" alt="Foto Guru">
        </div>
        <div class="info">
            <p><span class="label">NIP:</span> {{ $guru->nip }}</p>
            <p><span class="label">NUPTK:</span> {{ $guru->nuptk }}</p>
            <p><span class="label">Nama Lengkap:</span> {{ $guru->nama_lengkap }}</p>
            <p><span class="label">Mata Pelajaran:</span> {{ $guru->mata_pelajaran }}</p>
            <p><span class="label">Status Kepegawaian:</span> {{ $guru->status_kepegawaian }}</p>
            <p><span class="label">Jabatan:</span> {{ $guru->jabatan }}</p>
            <p><span class="label">Jenis Kelamin:</span> {{ $guru->jenis_kelamin }}</p>
            <p><span class="label">Agama:</span> {{ $guru->agama }}</p>
            <p><span class="label">Alamat:</span> {{ $guru->alamat }}</p>
            <p><span class="label">Email:</span> {{ $guru->email }}</p>
            <p><span class="label">No. Telepon:</span> {{ $guru->telepon }}</p>
        </div>
    </div>
</body>
</html>
