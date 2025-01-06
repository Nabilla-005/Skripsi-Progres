<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_kosong_dosens', function (Blueprint $table) {
            $table->id('id_jadwal_kosong'); // Kolom id_jadwal_kosong sebagai Primary Key
            $table->unsignedBigInteger('id_dosen'); // Kolom id_dosen sebagai Foreign Key (unsignedBigInteger untuk mencocokkan tipe data dengan id di dosens)
            $table->foreign('id_dosen')->references('id_dosen')->on('dosens')->onDelete('cascade'); // Menambahkan foreign key constraint ke tabel dosens
            $table->date('tanggal'); // Kolom tanggal jadwal kosong
            $table->time('waktu_mulai'); // Kolom waktu mulai
            $table->time('waktu_selesai'); // Kolom waktu selesai
            $table->enum('status', ['tersedia', 'penuh']); // Kolom status jadwal
            $table->timestamps(); // Kolom created_at dan updated_at
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_kosong_dosens');
    }
};
