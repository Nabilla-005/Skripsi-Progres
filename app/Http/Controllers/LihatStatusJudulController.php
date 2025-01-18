
<?php

namespace App\Http\Controllers;

use App\Models\PengajuanJudul;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class LihatStatusJudulController extends Controller
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
    // Cek apakah pengguna sudah login
    if (!Auth::check()) {
        // Jika pengguna belum login, arahkan ke halaman login
        return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
    }

    // Ambil data pengguna yang sedang login
    $user = Auth::user();

    // Ambil data mahasiswa yang memiliki email yang sama dengan pengguna yang sedang login
    $mahasiswa = Mahasiswa::where('email', $user->email)->first();

    if (!$mahasiswa) {
        // Jika tidak ada data mahasiswa yang cocok dengan email user yang login
        return redirect()->route('home')->withErrors('Data mahasiswa tidak ditemukan!');
    }

    // Ambil pengajuan berdasarkan id_mahasiswa yang cocok dengan mahasiswa yang sedang login
    $pengajuans = PengajuanJudul::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->get();

    return view('pengajuan.LihatStatusPengajuan', compact('pengajuans'));
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
