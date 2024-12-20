<?php

namespace App\Http\Controllers;

use App\Models\feedback_skripsi;
use App\Models\progres_skripsi;
use App\Models\pengajuan_judul;
use Illuminate\Http\Request;
class Manajemen_Skripsi_MahasiswaController extends Controller
{
// Method untuk menampilkan halaman utama manajemen skripsi
public function index()
{
    $pengajuan = pengajuan_judul::with('mahasiswa')->get();
    $progres = progres_skripsi::with('mahasiswa')->get();

    return view('admin.pengajuan.index', compact('pengajuan', 'progres'));
}

    // Menyimpan pengajuan judul skripsi
    public function storePengajuan(Request $request)
    {
        $validated = $request->validate([
            'id_mahasiswa' => 'required|exists:mahasiswa,id_mahasiswa',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'file_path' => 'nullable|file',
        ]);

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('pengajuan_judul');
        }

        pengajuan_judul::create($validated);
        return redirect()->back()->with('success', 'Pengajuan berhasil disimpan.');
    }

    // Melihat daftar progres skripsi
    public function indexProgres()
    {
        $progres = progres_skripsi::with('mahasiswa')->get();
        return view('admin.progres.index', compact('progres'));
    }

    // Menyimpan progres skripsi
    public function storeProgres(Request $request)
    {
        $validated = $request->validate([
            'id_mahasiswa' => 'required|exists:mahasiswa,id_mahasiswa',
            'file_path' => 'nullable|file',
            'komentar' => 'nullable',
            'tanggal_upload' => 'required|date',
        ]);

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('progres_skripsi');
        }

        progres_skripsi::create($validated);
        return redirect()->back()->with('success', 'Progres berhasil ditambahkan.');
}
}

