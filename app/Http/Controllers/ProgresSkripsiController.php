<?php

namespace App\Http\Controllers;

use App\Models\ProgresSkripsi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProgresSkripsiController extends Controller
{
    /**
     * Menampilkan form upload progres skripsi.
     */
    public function create()
    {
        return view('ProgresSkripsi.create');
    }

    /**
     * Menyimpan progres skripsi ke database.
     */
    public function store(Request $request)
{
    // Validasi input file
    $request->validate([
        'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
    ]);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Cari id_mahasiswa berdasarkan email atau name dari tabel mahasiswas
    $mahasiswa = Mahasiswa::where('email', $user->email)->orWhere('nama', $user->name)->first();

    if (!$mahasiswa) {
        // Jika tidak ditemukan, tampilkan pesan error
        return redirect()->back()->withErrors('Data mahasiswa tidak ditemukan!');
    }

    // Simpan file ke storage
    $uploadedFile = $request->file('file');
    $filePath = $uploadedFile->store('progres_skripsi');

    // Simpan data ke database progres_skripsis
    ProgresSkripsi::create([
        'id_mahasiswa' => $mahasiswa->id_mahasiswa,
        'file_path' => $filePath,
        'file_name' => $uploadedFile->getClientOriginalName(), // Nama file asli
        'tanggal_upload' => now(),
        'komentar' => $request->input('komentar', ''), // Opsional jika komentar kosong
    ]);

    return redirect()->route('LihatProgresSkripsi.index')->with('success', 'Progres skripsi berhasil diunggah!');
}



    /**
     * Menampilkan daftar progres skripsi.
     */
    public function index(Request $request)
    {
        $query = ProgresSkripsi::with('mahasiswa');
    
        // Filter berdasarkan nama mahasiswa atau NIM
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereHas('mahasiswa', function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%$search%")
                  ->orWhere('nim', 'LIKE', "%$search%");
            });
        }
    
        $progresSkripsi = $query->get();
    
        return view('ProgresSkripsi.index', compact('progresSkripsi'));
    }
    

    /**
     * Menampilkan detail progres skripsi tertentu.
     */
    public function show(ProgresSkripsi $ProgresSkripsi)
    {
        return view('ProgresSkripsi.show', ['progres' => $ProgresSkripsi]);
    }
    

    /**
     * Menghapus progres skripsi.
     */
    public function destroy($id)
    {
        // Cari progres skripsi berdasarkan ID
        $progres = ProgresSkripsi::findOrFail($id);

        // Hapus file dari storage
        if (Storage::exists($progres->file_path)) {
            Storage::delete($progres->file_path);
        }

        // Hapus data dari database
        $progres->delete();

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('ProgresSkripsi.index')->with('success', 'Progres skripsi berhasil dihapus!');
    }

    /**
     * Memperbarui komentar pada progres skripsi.
     */
    public function updateKomentar(Request $request, $id)
    {
        $request->validate([
            'komentar' => 'required|string|max:500',
        ]);

        $progres = ProgresSkripsi::findOrFail($id);
        $progres->update([
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('ProgresSkripsi.show', $id)->with('success', 'Komentar berhasil diperbarui!');
    }
}
