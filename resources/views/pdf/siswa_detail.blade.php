<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Detail Siswa</title>
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

        .nis {
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
        <div class="judul">{{ $siswa->nama_lengkap }}</div>
        <div class="nis">NIS : {{ $siswa->nis }}</div>

        <table>
            <tr>
                <td class="foto">
                    <img src="{{ public_path('storage/' . $siswa->foto) }}" alt="Foto Siswa">
                </td>
                <td>
                    <p><span class="label">NISN:</span> {{ $siswa->nisn }}</p>
                    <p><span class="label">Kelas:</span> {{ $siswa->kelas }}</p>
                    <p><span class="label">Agama:</span> {{ $siswa->agama }}</p>
                    <p><span class="label">Jenis Kelamin:</span> {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                    <p><span class="label">Alamat:</span> {{ $siswa->alamat }}</p>
                    <p><span class="label">Nama Ayah:</span> {{ $siswa->nama_ayah }}</p>
                    <p><span class="label">Nama Ibu:</span> {{ $siswa->nama_ibu }}</p>
                    <p><span class="label">Telepon Ayah:</span> {{ $siswa->telepon_ayah }}</p>
                    <p><span class="label">Telepon Ibu:</span> {{ $siswa->telepon_ibu }}</p>
                    <p><span class="label">Alamat Orang Tua:</span> {{ $siswa->alamat_ortu }}</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
