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
        Schema::create('pengajuan_juduls', function (Blueprint $table) {
            $table->id('id_pengajuan'); // Kolom id_pengajuan sebagai Primary Key
            $table->unsignedBigInteger('id_mahasiswa'); // Kolom id_dosen sebagai Foreign Key (unsignedBigInteger untuk mencocokkan tipe data dengan id di dosens)
            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswas')->onDelete('cascade');
            $table->string('judul', 255); // Kolom judul untuk menyimpan judul skripsi
            $table->text('deskripsi'); // Kolom deskripsi untuk menyimpan deskripsi judul
            $table->string('file_path', 255); // Kolom file_path untuk menyimpan lokasi file skripsi
            $table->enum('status', ['diterima', 'ditolak', 'proses']); // Kolom status untuk pengajuan
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
        Schema::dropIfExists('pengajuan_juduls');
    }
};
