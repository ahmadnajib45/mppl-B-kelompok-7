<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Siswa;
use App\Models\Guru;

class PDFController extends Controller
{

public function siswaDetailPdf($id)
{
    $siswa = Siswa::findOrFail($id);
    $pdf = PDF::loadView('pdf.siswa_detail', compact('siswa'));
    return $pdf->download('detail_siswa_'.$siswa->nama_lengkap.'.pdf');
}

public function guruDetailPdf($id)
{
    $guru = Guru::findOrFail($id);
    $pdf = PDF::loadView('pdf.guru_detail', compact('guru'));
    return $pdf->download('detail_guru_'.$guru->nama_lengkap.'.pdf');
}
}
