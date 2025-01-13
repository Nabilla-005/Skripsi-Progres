<?php

// app/Http/Controllers/StatistikDanLaporanController.php
namespace App\Http\Controllers;

use App\Models\StatistikSistem;
use App\Models\mahasiswa;
use App\Models\dosen;
use App\Models\jadwal_kosong_dosen;
use App\Models\feedback_skripsi;
use App\Models\forum_diskusi;
use App\Models\ProgresSkripsi;
use App\Models\PengajuanJudul;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // Mengambil statistik sistem terbaru
        $statistik = StatistikSistem::first();

        // Menghitung jumlah mahasiswa, dosen, dan jadwal
        $totalMahasiswa = mahasiswa::count();
        $totalDosen = dosen::count();
        $totalJadwal = jadwal_kosong_dosen::count();
        $totalFeedback = feedback_skripsi::count();
        $totalForumDiskusi = forum_diskusi::count();
        $totalProgresSkripsi = ProgresSkripsi::count();
        $totalPengajuanJudul = PengajuanJudul::count();
        $totalManajemenSkripsi =  $totalProgresSkripsi + $totalPengajuanJudul;

        // Mengirim data ke view
        return view('beranda', compact('statistik', 'totalMahasiswa', 'totalDosen', 'totalJadwal','totalFeedback',
            'totalForumDiskusi', 'totalPengajuanJudul', 'totalProgresSkripsi', 'totalManajemenSkripsi'));
    }

    public function generateLaporan(Request $request)
    {
        // Mengambil laporan aktivitas mahasiswa dan dosen
        $aktivitasMahasiswa = Mahasiswa::with('logAktivitas')->get();
        $aktivitasDosen = Dosen::with('logAktivitas')->get();

        return view('beranda', compact('aktivitasMahasiswa', 'aktivitasDosen'));
    }
}
