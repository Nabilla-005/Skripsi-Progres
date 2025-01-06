<?php

namespace App\Http\Controllers;

use App\Models\PengajuanJudul;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
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
            'file_path' => $filePath,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => 'proses', // Status default
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

    public function update(Request $request, $id_pengajuan)
    {
        \Log::info('Update Request: ', $request->all()); // Log input request
    
        $validated = $request->validate([
            'status' => 'required|in:proses,diterima,ditolak',
        ]);
        // Ambil pengajuan berdasarkan id
        $pengajuan = \App\Models\PengajuanJudul::findOrFail($id_pengajuan);
        // Update data pengajuan dengan nilai yang sudah divalidasi
        $pengajuan->fill($validated);
        // Simpan perubahan
        $pengajuan->save();
    
        \Log::info('Updated Pengajuan: ', $pengajuan->toArray()); // Log data setelah update
    
        flash('Data berhasil diperbarui')->success();
        return redirect()->route('pengajuan.index');
    }
    

}
