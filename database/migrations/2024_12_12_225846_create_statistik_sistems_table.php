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
        Schema::create('statistik_sistems', function (Blueprint $table) {
            $table->id('id_statistik'); // Kolom id_statistik sebagai Primary Key
            $table->integer('total_mahasiswa'); // Kolom total_mahasiswa untuk menyimpan jumlah mahasiswa
            $table->integer('total_dosen'); // Kolom total_dosen untuk menyimpan jumlah dosen
            $table->integer('total_jadwal'); // Kolom total_jadwal untuk menyimpan jumlah jadwal
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
        Schema::dropIfExists('statistik_sistems');
    }
};
