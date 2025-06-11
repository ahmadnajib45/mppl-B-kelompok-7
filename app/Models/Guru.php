<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
    'foto', 'nip', 'nuptk', 'nama_lengkap', 'mapel',
    'status_kepegawaian', 'jabatan', 'jenis_kelamin',
    'agama', 'alamat', 'email', 'telepon',
        ];
}
