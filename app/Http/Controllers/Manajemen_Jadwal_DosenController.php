<?php

// app/Http/Controllers/ScheduleController.php
namespace App\Http\Controllers;

use App\Models\jadwal_kosong_dosen;
use App\Models\dosen;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Manajemen_Jadwal_DosenController extends Controller
{
    public function index()
    {
        // Ambil data jadwal kosong dengan nama dosen
        $jadwal = jadwal_kosong_dosen::with('dosen')->get();

        return view('manajemen_jadwal_dosen', compact('jadwal'));
    }

    public function create()
    {
        // Ambil daftar dosen untuk dropdown
        $dosen = dosen::all();
        return view('jadwalkosong.jadwalkosong_create', compact('dosen'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_dosen' => 'required|exists:dosens,id_dosen',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i:s',  // Menggunakan format H:i:s
            'waktu_selesai' => 'required|date_format:H:i:s|after:waktu_mulai',
            'status' => 'required|in:tersedia,penuh',
        ]);

        // Simpan data ke database
        jadwal_kosong_dosen::create($request->all());

        return redirect()->route('manajemen_jadwal_dosen')->with('success', 'Jadwal berhasil ditambahkan.');
}

// app/Http/Controllers/ScheduleController.php
public function edit($id)
{
    // Ambil data jadwal berdasarkan ID
    $jadwal = jadwal_kosong_dosen::findOrFail($id);

    // Konversi waktu_mulai dan waktu_selesai ke format Carbon
    $jadwal->waktu_mulai = Carbon::parse($jadwal->waktu_mulai);
    $jadwal->waktu_selesai = Carbon::parse($jadwal->waktu_selesai);

    // Ambil daftar dosen untuk dropdown
    $dosen = Dosen::all();

    return view('jadwalkosong.edit', compact('jadwal','dosen'));
}

public function update(Request $request, $id)
{
    // Debugging: Cek data yang dikirim
    \Log::info('Data yang diterima: ', $request->all());

    // Validasi input
    $request->validate([
        'id_dosen' => 'required|exists:dosens,id_dosen',
        'tanggal' => 'required|date',
        'waktu_mulai' => 'required|date_format:H:i:s',  // Menggunakan format H:i:s
        'waktu_selesai' => 'required|date_format:H:i:s|after:waktu_mulai',
        'status' => 'required|in:tersedia,penuh',
    ]);

    // Cari data jadwal yang akan diperbarui
    $jadwal = jadwal_kosong_dosen::findOrFail($id);

    // Jika perlu, Anda dapat mengonversi waktu menggunakan Carbon
    $jadwal->waktu_mulai = \Carbon\Carbon::parse($request->waktu_mulai);
    $jadwal->waktu_selesai = \Carbon\Carbon::parse($request->waktu_selesai);

    // Perbarui data jadwal
    $jadwal->update($request->all());

    // Log data yang diperbarui
    \Log::info('Data yang diperbarui: ', $jadwal->fresh()->toArray());  // Menggunakan fresh() untuk mendapatkan data terbaru

    return redirect()->route('manajemen_jadwal_dosen')->with('success', 'Jadwal berhasil diperbarui.');
}


// app/Http/Controllers/ScheduleController.php
public function destroy($id)
{
    // Cari data jadwal berdasarkan ID
    $jadwal = jadwal_kosong_dosen::findOrFail($id);

    // Hapus data jadwal
    $jadwal->delete();

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('manajemen_jadwal_dosen')->with('success', 'Jadwal berhasil dihapus.');
}
}