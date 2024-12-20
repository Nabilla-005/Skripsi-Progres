<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // Anda bisa menambahkan data seperti statistik atau informasi lainnya
        $admin = auth()->user(); // Mengambil data admin yang sedang login
        return view('beranda', compact('admin'));
}
}