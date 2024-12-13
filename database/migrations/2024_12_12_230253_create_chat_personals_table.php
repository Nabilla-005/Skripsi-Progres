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
        Schema::create('chat_personal', function (Blueprint $table) {
            $table->id('id_pesan'); // Kolom id_pesan sebagai Primary Key
            $table->unsignedBigInteger('id_pengirim');
            $table->foreign('id_pengirim')->references('id_user')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_penerima');
            $table->foreign('id_penerima')->references('id_user')->on('users')->onDelete('cascade');
            $table->text('isi_pesan'); // Kolom isi_pesan untuk konten pesan
            $table->dateTime('waktu_kirim'); // Kolom waktu_kirim untuk menyimpan waktu pengiriman pesan
            $table->enum('status_baca', ['dibaca', 'belum dibaca']); // Kolom status_baca untuk menyimpan status pesan

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
        Schema::dropIfExists('chat_personals');
    }
};
