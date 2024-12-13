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
        Schema::create('progres_skripsis', function (Blueprint $table) {
            $table->id('id_progres'); // Kolom id_progres sebagai Primary Key
            $table->unsignedBigInteger('id_mahasiswa'); // Kolom id_dosen sebagai Foreign Key (unsignedBigInteger untuk mencocokkan tipe data dengan id di dosens)
            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswas')->onDelete('cascade');
            $table->string('file_path', 255); // Kolom file_path untuk menyimpan lokasi file
            $table->text('komentar'); // Kolom komentar untuk menyimpan komentar dosen
            $table->dateTime('tanggal_upload'); // Kolom tanggal_upload untuk menyimpan waktu unggah
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
        Schema::dropIfExists('progres_skripsis');
    }
};
