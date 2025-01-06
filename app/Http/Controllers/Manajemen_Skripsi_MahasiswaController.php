<?php

namespace App\Http\Controllers;

use App\Models\PengajuanJudul;  // Pastikan diimport dengan benar
use App\Models\ProgresSkripsi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class Manajemen_Skripsi_MahasiswaController extends Controller
{
    // Menampilkan daftar mahasiswa beserta status bimbingan dan progres skripsi mereka
    public function index()
    {
        $mahasiswas = mahasiswa::with(['pengajuanJuduls', 'progresSkripsis'])->get();
        return view('manajemen_skripsi_mahasiswa', compact('mahasiswas'));
    }

    // Menyimpan pengajuan judul skripsi
    public function storePengajuan(Request $request)
    {
        $validated = $request->validate([
            'id_mahasiswa' => 'required|exists:mahasiswas,id_mahasiswa',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'file_path' => 'nullable|file',
        ]);

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('pengajuan_judul');
        }

        PengajuanJudul::create($validated);
        return redirect()->back()->with('success', 'Pengajuan berhasil disimpan.');
    }
}