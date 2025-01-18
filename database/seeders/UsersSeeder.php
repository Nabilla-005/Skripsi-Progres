<?php

namespace Database\Seeders;

use App\Models\users; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UsersSeeder extends Seeder
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
        users::truncate();

        // Enable foreign key constraints kembali
        Schema::enableForeignKeyConstraints();

        // Tambahkan data dosen
        $data = [
            [
                    'username' => 'Admin1',  
                    'password' => 'admin123',  
                    'role' => 'admin',  
            ],
        
                // Seeder untuk dosen
            [
                    'username' => '111024',  // NIP dosen
                    'password' => 'jhony123',
                    'role' => 'dosen',
            ],
        
                // Seeder untuk mahasiswa
            [
                    'username' => '152023',  // NIM mahasiswa
                    'password' => 'mhs123',
                    'role' => 'mahasiswa',
            ],
        ];

        // Insert data ke dalam tabel
        foreach ($data as $users) {
            users::create($users);
}
}
}
