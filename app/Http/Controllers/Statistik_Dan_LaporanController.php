<?php

// app/Http/Controllers/StatistikDanLaporanController.php
namespace App\Http\Controllers;

use App\Models\StatistikSistem;
use App\Models\mahasiswa;
use App\Models\dosen;
use App\Models\jadwal_kosong_dosen;
use Illuminate\Http\Request;

class Statistik_Dan_LaporanController extends Controller
{
    public function index()
    {
        // Mengambil statistik sistem terbaru
        $statistik = StatistikSistem::first();

        // Menghitung jumlah mahasiswa, dosen, dan jadwal
        $totalMahasiswa = mahasiswa::count();
        $totalDosen = dosen::count();
        $totalJadwal = jadwal_kosong_dosen::count();

        // Mengirim data ke view
        return view('statistik&laporan', compact('statistik', 'totalMahasiswa', 'totalDosen', 'totalJadwal'));
    }

    public function generateLaporan(Request $request)
    {
        // Mengambil laporan aktivitas mahasiswa dan dosen
        $aktivitasMahasiswa = Mahasiswa::with('logAktivitas')->get();
        $aktivitasDosen = Dosen::with('logAktivitas')->get();

        return view('statistik_dan_laporan.laporan', compact('aktivitasMahasiswa', 'aktivitasDosen'));
    }
}
