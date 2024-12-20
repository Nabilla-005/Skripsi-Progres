<?php

namespace App\Http\Controllers;

use App\Models\forum_diskusi;
use App\Models\komentar_forum;
use Illuminate\Http\Request;

class Manajemen_Forum_DiskusiController extends Controller
{
    // Menampilkan daftar forum
    public function index()
    {
        // Ambil forum dengan relasi komentar dan pembuat (user)
        $forums = forum_diskusi::with('komentar', 'pembuat')->get();
        return view('manajemen_forum_diskusi', compact('forums'));
    }

    // Menampilkan form untuk membuat forum baru
    public function create()
    {
        return view('forum.create');
    }

    // Menyimpan forum baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:personal,kelompok,umum',
        ]);

        // Membuat forum baru
        forum_diskusi::create([
            'id_pembuat' => auth()->id(), // Menggunakan id pembuat forum yang sedang login
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'tanggal_dibuat' => now(),
        ]);

        return redirect()->route('manajemen_forum_diskusi');
    }

    // Menghapus forum
    public function destroy($id)
    {
        // Mencari forum berdasarkan ID dan menghapusnya
        $forum = forum_diskusi::findOrFail($id);
        $forum->delete();

        return redirect()->route('manajemen_forum_diskusi');
    }

    // Menyimpan komentar pada forum
    public function storeKomentar(Request $request, $id_forum)
{
    $request->validate([
        'isi' => 'required|string',
    ]);

    $forum = forum_diskusi::findOrFail($id_forum);

    komentar_forum::create([
        'id_forum' => $forum->id_forum,
        'id_user' => auth()->id(),  // Menggunakan ID pengguna yang sedang login
        'isi' => $request->isi,
    ]);

    return redirect()->route('manajemen_forum_diskusi');
}
}
