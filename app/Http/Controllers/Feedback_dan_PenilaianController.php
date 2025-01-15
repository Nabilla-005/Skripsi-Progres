<?php

namespace App\Http\Controllers;
use App\Models\feedback_skripsi;
use App\Models\ProgresSkripsi;
use Illuminate\Http\Request;

class Feedback_dan_PenilaianController extends Controller
{
    /**
     * Menampilkan feedback dan penilaian dosen untuk mahasiswa.
     */
    public function showFeedbackAndPenilaian($id)
    {
        // Pastikan mahasiswa yang login hanya dapat melihat feedback mereka sendiri
        $this->authorize('view-feedback', $id); // Gunakan jika Anda menambahkan policy untuk ini

        // Ambil progres skripsi berdasarkan id mahasiswa
        $progresSkripis = ProgresSkripsi::where('id_mahasiswa', $id)->with('feedbacks')->get();

        // Jika tidak ada progres, tampilkan pesan error atau pengalihan
        if ($progresSkripis->isEmpty()) {
            return redirect()->route('home')->with('error', 'Tidak ada progres skripsi ditemukan.');
        }
    }

    public function index()
{
    // Mengambil semua feedback dan progres
    $allFeedback = feedback_skripsi::with('progres.mahasiswa')->get();

    return view('feedback&penilaian', compact('allFeedback'));
}

}