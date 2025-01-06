<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Manajemen_Akun_DosenController extends Controller
{
    public function index()
    {
        // Menampilkan daftar dosen
        $dosens = dosen::all();
        return view('manajemen_akun_dosen', compact('dosens'));
    }

    public function create()
    {

        // Menampilkan form untuk menambah data dosen
        return view('dosens.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nip' => 'required|unique:dosens,nip|max:20',
            'nama' => 'required|max:100',
            'fakultas' => 'required|max:100',
            'email' => 'required|email|unique:dosens,email|max:100',
            'password' => 'required|min:6',
        ]);

        // Simpan data dosen baru ke database
        Dosen::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'fakultas' => $request->fakultas,
            'email' => $request->email,
            'password' => $request->password, // Password di-hash untuk keamanan
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('manajemen_akun_dosen')->with('success', 'Dosen berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosens.edit', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required|unique:dosens,nip,' . $id . ',id_dosen',
            'email' => 'required|email|unique:dosens,email,' . $id . ',id_dosen',
        ]);

        $dosen = Dosen::findOrFail($id);
        $dosen->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'fakultas' => $request->fakultas,
            'email' => $request->email,
            // Password tidak di-update kecuali diberikan input baru
        ]);

        return redirect()->route('manajemen_akun_dosen')->with('success', 'Data dosen berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Menghapus data dosen
        Dosen::destroy($id);
        return redirect()->route('manajemen_akun_dosen')->with('success', 'Dosen berhasil dihapus');
    }
}