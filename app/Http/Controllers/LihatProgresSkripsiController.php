
<?php

namespace App\Http\Controllers;

use App\Models\ProgresSkripsi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class LihatProgresSkripsiController extends Controller
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
    $filePath = $request->file('file')->store('progres_skripsi');

    // Simpan data ke database progres_skripsis
    ProgresSkripsi::create([
        'id_mahasiswa' => $mahasiswa->id_mahasiswa, // id_mahasiswa dari tabel mahasiswas
        'file_path' => $filePath,
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
    // Ambil ID pengguna yang sedang login
    $userId = Auth::user()->id;

    // Ambil data mahasiswa berdasarkan pengguna yang sedang login
    $mahasiswa = Mahasiswa::where('email', Auth::user()->email)->orWhere('nama', Auth::user()->name)->first();

    if (!$mahasiswa) {
        // Jika data mahasiswa tidak ditemukan, redirect dengan pesan error
        return redirect()->back()->withErrors('Data mahasiswa tidak ditemukan!');
    }

    // Ambil progres skripsi milik mahasiswa yang sedang login
    $query = ProgresSkripsi::with('mahasiswa')
                ->where('id_mahasiswa', $mahasiswa->id_mahasiswa);

    // Filter berdasarkan pencarian (opsional)
    if ($request->has('search')) {
        $search = $request->input('search');
        $query->whereHas('mahasiswa', function ($q) use ($search) {
            $q->where('nama', 'LIKE', "%$search%")
              ->orWhere('nim', 'LIKE', "%$search%")
              ->orWhere('tanggal_upload', 'LIKE', "%$search%");
        });
    }

    $progresSkripsi = $query->get();

    return view('LihatProgresSkripsi.index', compact('progresSkripsi'));
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
        return redirect()->route('LihatProgresSkripsi.index')->with('success', 'Progres skripsi berhasil dihapus!');
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

    public function download($id)
{
    // Cari progres berdasarkan ID
    $progres = ProgresSkripsi::findOrFail($id);

    // Periksa keberadaan file
    if (!Storage::exists($progres->file_path)) {
        // Redirect dengan pesan error jika file tidak ditemukan
        return redirect()->back()->withErrors(['File tidak ditemukan di server.']);
    }

    // Ambil nama file asli
    $fileName = basename($progres->file_path);

    // Mengunduh file dari storage dan memberi nama sesuai file asli
    return response()->download(storage_path("app/{$progres->file_path}"), $fileName);
}


}
