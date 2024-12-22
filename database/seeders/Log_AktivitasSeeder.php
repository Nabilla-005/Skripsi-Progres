<?php

namespace Database\Seeders;

use App\Models\log_aktivitas; // Pastikan nama model benar
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class Log_AktivitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key constraints
        Schema::disableForeignKeyConstraints();

        // Bersihkan data lama jika ada
        log_aktivitas::truncate();

        // Enable foreign key constraints kembali
        Schema::enableForeignKeyConstraints();

        // Tambahkan data dosen
        $data = [
            [
                    'id_pengguna' => '3',  
                    'jenis_aktivitas' => 'jadwal_bimbingan',  
                    'waktu_aktivitas' => '2024-12-17 09:00:00',  
            ],

        ];

        // Insert data ke dalam tabel
        foreach ($data as $log_aktivitas) {
            log_aktivitas::create($log_aktivitas);
}
}
}
