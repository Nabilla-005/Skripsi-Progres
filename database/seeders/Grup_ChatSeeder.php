<?php

namespace Database\Seeders;

use App\Models\grup_chat; // Pastikan nama model benar
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class Grup_ChatSeeder extends Seeder
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
        grup_chat::truncate();

        // Enable foreign key constraints kembali
        Schema::enableForeignKeyConstraints();

        // Tambahkan data grup_chat
        $data = [
            [
                    'nama_grup' => ' Grup Angkatan23',  
                    'id_pembuat' => '2',  
                    'tanggal_dibuat' => '2024-12-17 19:47:54', 
            ],
        
        ];

        // Insert data ke dalam tabel
        foreach ($data as $grup_chat) {
            grup_chat::create($grup_chat);
}
}
}
