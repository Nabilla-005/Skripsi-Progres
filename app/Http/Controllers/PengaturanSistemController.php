<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;

class PengaturanSistemController extends Controller
{
    // Menampilkan halaman pengaturan
    public function index()
    {
        // Ambil pengaturan dari database atau file konfigurasi
        $settings = Setting::all();
        return view('pengaturan_sistem', compact('settings'));
    }

    // Mengubah pengaturan email dan notifikasi
    public function update(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'email' => 'required|email',
            'smtp_host' => 'required',
            'smtp_port' => 'required|numeric',
            'smtp_username' => 'required',
            'smtp_password' => 'required',
        ]);

        // Simpan pengaturan di database atau file
        // Misalnya, menyimpan ke table 'settings'
        $setting = Setting::updateOrCreate(
            ['key' => 'email_smtp'],
            ['value' => json_encode($validated)]
        );

        // Atur konfigurasi Laravel untuk email menggunakan data yang baru
        Config::set('mail.mailers.smtp', [
            'driver' => 'smtp',
            'host' => $validated['smtp_host'],
            'port' => $validated['smtp_port'],
            'username' => $validated['smtp_username'],
            'password' => $validated['smtp_password'],
            'encryption' => 'tls',
            'from' => ['address' => $validated['email'], 'name' => 'Admin'],
        ]);

        return redirect()->back()->with('success', 'Pengaturan email berhasil diperbarui');
    }

    // Fungsi untuk mengirim email tes untuk memastikan pengaturan email berfungsi
    public function testEmail()
    {
        try {
            Mail::raw('Test email to check settings', function ($message) {
                $message->to('admin@example.com')->subject('Test Email');
            });

            return back()->with('success', 'Email test berhasil terkirim.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim email: ' . $e->getMessage());
        }
    }
}
