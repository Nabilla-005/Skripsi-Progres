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

    public function backupData()
{
    try {
        \Log::info('Backup data function called');

        // Nama file hasil backup
        $fileName = 'backup-' . date('Y-m-d_H-i-s') . '.sql';

        // Lokasi tempat menyimpan file backup
        $backupPath = storage_path('app/backups/' . $fileName);

        // Pastikan folder backup ada
        if (!file_exists(storage_path('app/backups'))) {
            mkdir(storage_path('app/backups'), 0777, true);
        }

        // Path absolut mysqldump (sesuaikan dengan instalasi Anda)
        $mysqldumpPath = 'C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin\mysqldump.exe';

        // Perintah untuk backup database
        $command = [
            $mysqldumpPath,
            '--host=' . env('DB_HOST'),
            '--port=' . env('DB_PORT'),
            '--user=' . env('DB_USERNAME'),
    '--password=' . env('DB_PASSWORD'),
            env('DB_DATABASE')
        ];
        

        // Jalankan perintah
        $process = new \Symfony\Component\Process\Process($command);
        $process->setTimeout(300);

        // Jalankan proses
        $process->run(function ($type, $buffer) use ($backupPath) {
            if ($type === \Symfony\Component\Process\Process::OUT) {
                // Tulis output ke file
                file_put_contents($backupPath, $buffer, FILE_APPEND);
            }
        });

        if (!$process->isSuccessful()) {
            throw new \Exception('Backup failed: ' . $process->getErrorOutput());
        }

        \Log::info('Backup successful: ' . $fileName);

        return redirect()->back()->with('success', 'Backup berhasil disimpan: ' . $fileName);
    } catch (\Exception $e) {
        \Log::error('Error during backup: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

public function restore(Request $request)
{
    try {
        // Validasi file backup
        $validated = $request->validate([
            'backup_file' => 'required|file|mimes:sql|max:10240', // Maksimal 10MB
        ]);

        // Ambil file backup yang diupload
        $backupFile = $request->file('backup_file');
        
        // Log MIME type dari file yang diupload
        \Log::info('Uploaded file MIME type: ' . $backupFile->getMimeType());

        // Cek jika file yang diupload bukan .sql
        if ($backupFile->getClientOriginalExtension() !== 'sql') {
            throw new \Exception('Backup file harus berupa berkas berjenis: sql.');
        }

        // Log ekstensi file
        \Log::info('File extension: ' . $backupFile->getClientOriginalExtension());

        $filePath = $backupFile->getPathname(); // Path file yang diupload

        // Log informasi file yang diupload
        \Log::info('Backup file path: ' . $filePath);

        // Perintah untuk restore menggunakan mysqldump
        $command = 'mysql -u' . env('DB_USERNAME') . ' -p' . env('DB_PASSWORD') . ' ' . env('DB_DATABASE') . ' < ' . $filePath;

        // Log perintah yang akan dijalankan
        \Log::info('Running command: ' . $command);

        // Jalankan perintah restore
        $output = null;
        $resultCode = null;
        exec($command, $output, $resultCode);

        // Log output perintah
        \Log::info('Command output: ' . implode("\n", $output));
        \Log::info('Command result code: ' . $resultCode);

        // Cek apakah perintah berhasil
        if ($resultCode !== 0) {
            throw new \Exception('Restore failed: ' . implode("\n", $output));
        }

        \Log::info('Restore completed successfully at ' . now());

        return back()->with('success', 'Data berhasil direstore.');
    } catch (\Exception $e) {
        \Log::error('Error during restore: ' . $e->getMessage());
        return back()->with('error', 'Terjadi kesalahan saat melakukan restore: ' . $e->getMessage());
    }
}

}