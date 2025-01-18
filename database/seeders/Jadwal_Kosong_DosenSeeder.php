<?php

namespace Database\Seeders;

use App\Models\jadwal_kosong_dosen; // Pastikan nama model benar
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class Jadwal_Kosong_DosenSeeder extends Seeder
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
        jadwal_kosong_dosen::truncate();

        // Enable foreign key constraints kembali
        Schema::enableForeignKeyConstraints();

        // Tambahkan data dosen
        $data = [
            [
                'id_dosen' => '1',
                'tanggal' => '2024-12-19',
                'waktu_mulai' => '07:00:00',
                'waktu_selesai' => '12:00:00',
                'status' => 'tersedia',
            ],
        ];

        // Insert data ke dalam tabel
        foreach ($data as $jadwal_kosong_dosen) {
            jadwal_kosong_dosen::create($jadwal_kosong_dosen);
}
}
}
