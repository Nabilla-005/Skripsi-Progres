<?php

namespace Database\Seeders;

use App\Models\forum_diskusi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class Forum_DiskusiSeeder extends Seeder
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
        forum_diskusi::truncate();

        // Enable foreign key constraints kembali
        Schema::enableForeignKeyConstraints();

        // Tambahkan data forum_diskusi
        $data = [
            [
                'id_user' => '1',
                'judul' => 'angkatan 23',
                'kategori' => 'umum',
                'tanggal_dibuat' => '2024-12-17 19:47:54',
            ],
        ];

        // Insert data ke dalam tabel
        foreach ($data as $forum_diskusi) {
            forum_diskusi::create($forum_diskusi);
}
}
}
