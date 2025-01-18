<?php

namespace Database\Seeders;

use App\Models\mahasiswa; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MahasiswaSeeder extends Seeder
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
        mahasiswa::truncate();

        // Enable foreign key constraints kembali
        Schema::enableForeignKeyConstraints();

        // Tambahkan data dosen
        $data = [
            [
                    'nim' => '152023',  
                    'nama' => 'human',  
                    'program_studi' => 'informatika', 
                    'email' => 'human@gmail.com',  
                    'password' => 'mhs123', 
            ],

        ];

        // Insert data ke dalam tabel
        foreach ($data as $mahasiswa) {
            mahasiswa::create($mahasiswa);
}
}
}
