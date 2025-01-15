<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function statistik()
    {
        // Hitung jumlah berdasarkan status
        $menungguSidang = Mahasiswa::byStatus('menunggu sidang')->count();
        $lulus = Mahasiswa::byStatus('lulus')->count();
        $progresSkripsi = Mahasiswa::byStatus('progres skripsi')->count();

        // Kirim data ke view
        return view('statistik&laporan', compact('menungguSidang', 'lulus', 'progresSkripsi'));
    }
}