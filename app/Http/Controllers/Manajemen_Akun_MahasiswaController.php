<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Manajemen_Akun_MahasiswaController extends Controller
{
    public function index()
    {
        // Menampilkan daftar mahasiswa
        $mahasiswas = Mahasiswa::all();
        return view('manajemen_akun_mahasiswa', compact('mahasiswas'));
    }

    public function create()
    {
        // Menampilkan form untuk menambah data mahasiswa
        return view('mahasiswas.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim|max:20',
            'nama' => 'required|max:100',
            'program_studi' => 'required|max:100',
            'email' => 'required|email|unique:mahasiswas,email|max:100',
            'password' => 'required|min:6',
        ]);

        // Simpan data mahasiswa baru ke database
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'program_studi' => $request->program_studi,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('manajemen_akun_mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswas.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $id . ',id_mahasiswa',
            'email' => 'required|email|unique:mahasiswas,email,' . $id . ',id_mahasiswa',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'program_studi' => $request->program_studi,
            'email' => $request->email,
        ]);

        return redirect()->route('manajemen_akun_mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui');
    }
    public function destroy($id)
    {
        // Menghapus data mahasiswa
        Mahasiswa::destroy($id);
        return redirect()->route('manajemen_akun_mahasiswa')->with('success', 'Mahasiswa berhasil dihapus');
    }
}
