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
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('Anda harus login terlebih dahulu.');
        }

        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file' => 'required|mimes:pdf,docx,doc|max:10240', // Max 10 MB
        ]);

        $user = Auth::user();

        // Ambil data mahasiswa terkait user yang login
        $mahasiswa = Mahasiswa::where('email', $user->email)->first();

        if (!$mahasiswa) {
            return redirect()->back()->withErrors('Tidak ada data mahasiswa yang terkait dengan akun Anda.');
        }

        // Proses file upload
        $filePath = $request->file('file')->store('pengajuan_judul_files');

        // Simpan data pengajuan
        PengajuanJudul::create([
            'id_mahasiswa' => $mahasiswa->id_mahasiswa,
            'file_path' => $filePath,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => 'proses',
        ]);

        return redirect()->route('pengajuan.LihatStatusPengajuan')->with('success', 'Pengajuan berhasil disimpan!');
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
        $pengajuan = PengajuanJudul::findOrFail($id_pengajuan);
        // Update data pengajuan dengan nilai yang sudah divalidasi
        $pengajuan->fill($validated);
        // Simpan perubahan
        $pengajuan->save();

        \Log::info('Updated Pengajuan: ', $pengajuan->toArray()); // Log data setelah update

        flash('Data berhasil diperbarui')->success();
        return redirect()->route('pengajuan.index');
    }

    public function download($id_pengajuan)
    {
        // Cari pengajuan berdasarkan ID
        $pengajuan = PengajuanJudul::findOrFail($id_pengajuan);

        // Log lokasi file untuk debugging
        \Log::info('File Path: ' . $pengajuan->file_path);

        // Cek jika file ada di storage
        if (Storage::exists($pengajuan->file_path)) {
            // Mendapatkan nama file asli
            $fileName = basename($pengajuan->file_path);

            // Mengembalikan file untuk diunduh dengan nama yang benar
            return Storage::download($pengajuan->file_path, $fileName);
        }

        // Jika file tidak ditemukan, tampilkan error atau redirect
        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }

    public function destroy($id_pengajuan)
    {
        // Cari pengajuan berdasarkan ID
        $pengajuan = PengajuanJudul::findOrFail($id_pengajuan);

        // Menghapus file yang di-upload (jika ada)
        if (Storage::exists($pengajuan->file_path)) {
            Storage::delete($pengajuan->file_path);
        }

        // Menghapus data pengajuan dari database
        $pengajuan->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('pengajuan.LihatStatusPengajuan')->with('success', 'Pengajuan berhasil dibatalkan!');
    }
}
