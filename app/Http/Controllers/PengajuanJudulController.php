<?php

namespace App\Http\Controllers;

use App\Models\PengajuanJudul;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PengajuanJudulController extends Controller
{
    /**
     * Menampilkan form pengajuan judul.
     */
    public function create()
    {
        return view('pengajuan.create');
    }

    /**
     * Menyimpan pengajuan judul beserta dokumennya.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file' => 'required|mimes:pdf,docx,doc|max:10240', // Max 10 MB
        ]);

        // Proses file upload
        $filePath = $request->file('file')->store('pengajuan_judul_files');

        // Simpan data pengajuan
        PengajuanJudul::create([
            'id_mahasiswa' => Auth::user()->id, // Asumsikan pengguna sudah login
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $filePath,
            'status' => 'pending', // Status default
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil disimpan!');
    }

    /**
     * Menampilkan daftar pengajuan judul.
     */
    public function index()
    {
        $pengajuans = PengajuanJudul::all();
        return view('pengajuan.index', compact('pengajuans'));
    }
}
