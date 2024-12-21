<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all(); // Ambil semua pengaturan dari database
        return view('pengaturan_sistem', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'email' => 'nullable|email',
            'notifications' => 'nullable|boolean',
        ]);

        // Update pengaturan email dan notifikasi
        if ($request->has('email')) {
            Setting::where('key', 'email')->update(['value' => $request->email]);
        }

        if ($request->has('notifications')) {
            Setting::where('key', 'notifications')->update(['value' => $request->notifications]);
        }

        return redirect()->route('pengaturan.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }

    public function backup()
    {
        // Logika backup data sistem
        $path = storage_path('app/backup/');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $backupFile = $path . 'backup_' . now()->format('Y_m_d_H_i_s') . '.sql';

        // Backup database
        \Artisan::call('db:backup', ['--database' => 'mysql', '--path' => $backupFile]);

        return response()->download($backupFile);
    }

    public function restore(Request $request)
    {
        // Pastikan file backup diupload
        $request->validate([
            'backup_file' => 'required|file|mimes:sql',
        ]);

        $backupFile = $request->file('backup_file');

        // Restore database dari file yang diupload
        $path = $backupFile->getRealPath();
        \Artisan::call('db:restore', ['--path' => $path]);

        return redirect()->route('pengaturan.index')->with('success', 'Backup berhasil dipulihkan.');
    }
}