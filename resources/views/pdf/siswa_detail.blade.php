<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Siswa</title>
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
    <h2>Detail Siswa</h2>
    <div class="container">
        <div class="foto">
            <img src="{{ public_path('storage/' . $siswa->foto) }}" width="100" alt="Foto Siswa">
        </div>
        <div class="info">
            <p><span class="label">NIS:</span> {{ $siswa->nis }}</p>
            <p><span class="label">NISN:</span> {{ $siswa->nisn }}</p>
            <p><span class="label">Nama Lengkap:</span> {{ $siswa->nama_lengkap }}</p>
            <p><span class="label">Kelas:</span> {{ $siswa->kelas }}</p>
            <p><span class="label">Agama:</span> {{ $siswa->agama }}</p>
            <p><span class="label">Jenis Kelamin:</span> {{ $siswa->jenis_kelamin }}</p>
            <p><span class="label">Alamat:</span> {{ $siswa->alamat }}</p>
            <p><span class="label">Nama Ayah:</span> {{ $siswa->nama_ayah }}</p>
            <p><span class="label">Nama Ibu:</span> {{ $siswa->nama_ibu }}</p>
            <p><span class="label">Telepon Ayah:</span> {{ $siswa->telepon_ayah }}</p>
            <p><span class="label">Telepon Ibu:</span> {{ $siswa->telepon_ibu }}</p>
            <p><span class="label">Alamat Orang Tua:</span> {{ $siswa->alamat_ortu }}</p>
        </div>
    </div>
</body>
</html>
