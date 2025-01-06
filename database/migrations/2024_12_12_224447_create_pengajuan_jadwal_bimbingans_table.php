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
        Schema::create('pengajuan_jadwal_bimbingans', function (Blueprint $table) {
            $table->id('id_pengajuan'); // Kolom id_pengajuan sebagai Primary Key
            $table->unsignedBigInteger('id_mahasiswa'); // Kolom id_dosen sebagai Foreign Key (unsignedBigInteger untuk mencocokkan tipe data dengan id di dosens)
            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswas')->onDelete('cascade');
            $table->unsignedBigInteger('id_jadwal_kosong'); // Kolom id_dosen sebagai Foreign Key (unsignedBigInteger untuk mencocokkan tipe data dengan id di dosens)
            $table->foreign('id_jadwal_kosong')->references('id_jadwal_kosong')->on('jadwal_kosong_dosens')->onDelete('cascade');
            $table->enum('status_pengajuan', ['menunggu', 'diterima', 'ditolak']); // Status pengajuan
            $table->text('catatan_dosen')->nullable(); // Catatan dari dosen (opsional)
            $table->dateTime('tanggal_pengajuan'); // Waktu pengajuan dibuat
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
        Schema::dropIfExists('pengajuan_jadwal_bimbingans');
    }
};
