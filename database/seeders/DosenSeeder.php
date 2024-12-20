<?php

namespace Database\Seeders;

use App\Models\dosen; // Pastikan nama model benar
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
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
        dosen::truncate();

        // Enable foreign key constraints kembali
        Schema::enableForeignKeyConstraints();

        // Tambahkan data dosen
        $data = [
            [
                'nip' => '111024',
                'nama' => 'Jhony',
                'fakultas' => 'FTI',
                'email' => 'jhony@gmail.com',
                'password' => 'jhony123',
            ],
            [
                'nip' => '111025',
                'nama' => 'Desi',
                'fakultas' => 'FTI',
                'email' => 'desi@gmail.com',
                'password' => 'desi456',
            ],
        ];

        // Insert data ke dalam tabel
        foreach ($data as $dosen) {
            dosen::create($dosen);
}
}
}
