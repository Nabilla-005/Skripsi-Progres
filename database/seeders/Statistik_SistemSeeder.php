<?php

namespace Database\Seeders;

use App\Models\statistik_sistem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class Statistik_SistemSeeder extends Seeder
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
        statistik_sistem::truncate();

        // Enable foreign key constraints kembali
        Schema::enableForeignKeyConstraints();

        // Tambahkan data forum_diskusi
        $data = [
            [
                'total_mahasiswa' => '50',
                'total_dosen' => '10',
                'total_jadwal' => '50',
            ],
        ];

        // Insert data ke dalam tabel
        foreach ($data as $statistik_sistem) {
            statistik_sistem::create($statistik_sistem);
}
}
}
