<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahGuru = Guru::count();
        $guruPerMapel = Guru::select('mapel', DB::raw('count(*) as total'))->groupBy('mapel')->get();
        $guruPerGender = Guru::select('jenis_kelamin', DB::raw('count(*) as total'))->groupBy('jenis_kelamin')->get();
        $guruPerStatus = Guru::select('status_kepegawaian', DB::raw('count(*) as total'))->groupBy('status_kepegawaian')->get();

        $jumlahSiswa = Siswa::count();
        $siswaPerKelas = Siswa::select('kelas', DB::raw('count(*) as total'))->groupBy('kelas')->get();
        $siswaPerGender = Siswa::select('jenis_kelamin', DB::raw('count(*) as total'))->groupBy('jenis_kelamin')->get();

        return view('dashboard', compact(
            'jumlahGuru', 'guruPerMapel', 'guruPerGender', 'guruPerStatus',
            'jumlahSiswa', 'siswaPerKelas', 'siswaPerGender'
        ));
    }
}
