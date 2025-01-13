<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function edit()
{
    return view('password.edit'); // Menampilkan form edit password
}

public function update(Request $request)
{
    // Validasi input
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|min:8|confirmed', // Konfirmasi password baru
    ]);

    $user = auth()->user(); // Mendapatkan pengguna yang sedang login

    // Verifikasi password lama
    if (!\Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
    }

    // Update password baru
    $user->update([
        'password' => bcrypt($request->password), // Hash password baru
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('ProfilAdmin.index')->with('success', 'Password berhasil diperbarui.');
}

}