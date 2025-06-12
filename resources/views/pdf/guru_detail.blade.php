<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Detail Guru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .container {
            border: 1px solid #999;
            padding: 20px;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            vertical-align: top;
            padding: 8px;
        }

        .foto {
            width: 120px;
        }

        .foto img {
            width: 100%;
            border: 1px solid #ccc;
        }

        .judul {
            text-align: center;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .nip {
            text-align: center;
            font-size: 16px;
            color: darkred;
            margin-bottom: 15px;
        }

        .label {
            font-weight: bold;
            color: darkred;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="judul">{{ $guru->nama_lengkap }}</div>
        <div class="nip">NUPTK : {{ $guru->nuptk }}</div>

        <table>
            <tr>
                <td class="foto">
                    <img src="{{ public_path('storage/' . $guru->foto) }}" alt="Foto Guru">
                </td>
                <td>
                    <p><span class="label">NIP:</span> {{ $guru->nip }}</p>
                    <p><span class="label">Mata Pelajaran:</span> {{ $guru->mata_pelajaran }}</p>
                    <p><span class="label">Status Kepegawaian:</span> {{ $guru->status_kepegawaian == 'PNS' ? 'PNS' : 'Non-PNS'}}</p>
                    <p><span class="label">Jabatan:</span> {{ $guru->jabatan }}</p>
                    <p><span class="label">Jenis Kelamin:</span> {{ $guru->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                    <p><span class="label">Agama:</span> {{ $guru->agama }}</p>
                    <p><span class="label">Alamat:</span> {{ $guru->alamat }}</p>
                    <p><span class="label">Email:</span> {{ $guru->email }}</p>
                    <p><span class="label">No. Telp:</span> {{ $guru->telepon }}</p>
                    <p><span class=
