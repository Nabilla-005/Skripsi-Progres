<?php

namespace Database\Seeders;

use App\Models\admin; // Pastikan nama model benar
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
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
        admin::truncate();

        // Enable foreign key constraints kembali
        Schema::enableForeignKeyConstraints();

        // Tambahkan data admin
        $data = [
            [
                'nama' => 'Admin1',
                'email' => 'admin1@gmail.com',
                'password' => 'Admin123',
            ],
            [
                'nama' => 'Admin2',
                'email' => 'admin2@gmail.com',
                'password' => 'Admin456',
            ],
        ];

        // Insert data ke dalam tabel
        foreach ($data as $admin) {
            Admin::create($admin);
}
}
}
