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
        Schema::create('forum_diskusis', function (Blueprint $table) {
            $table->id('id_forum'); // Kolom id_forum sebagai Primary Key
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('judul', 255); // Kolom judul untuk menyimpan judul forum diskusi
            $table->enum('kategori', ['personal', 'kelompok', 'umum']); // Kolom kategori untuk menyimpan jenis diskusi
            $table->dateTime('tanggal_dibuat'); // Kolom tanggal_dibuat untuk menyimpan waktu forum dibuat
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
        Schema::dropIfExists('forum_diskusis');
    }
};
