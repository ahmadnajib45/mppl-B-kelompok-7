<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
    'foto', 'nis', 'nisn', 'nama_lengkap', 'kelas', 'agama',
    'jenis_kelamin', 'alamat', 'nama_ayah', 'nama_ibu',
    'telepon_ayah', 'telepon_ibu', 'alamat_ortu',
];

}
