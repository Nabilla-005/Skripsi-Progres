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
        Schema::create('chat_grup', function (Blueprint $table) {
            $table->id('id_pesan'); // Kolom id_pesan sebagai Primary Key
            $table->unsignedBigInteger('id_grup');
            $table->foreign('id_grup')->references('id_grup')->on('grup_chat')->onDelete('cascade');
            $table->unsignedBigInteger('id_pengirim');
            $table->foreign('id_pengirim')->references('id_user')->on('users')->onDelete('cascade');
            $table->text('isi_pesan'); // Kolom isi_pesan untuk konten pesan
            $table->dateTime('waktu_kirim'); // Kolom waktu_kirim untuk menyimpan waktu pengiriman pesan
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
        Schema::dropIfExists('chat_grups');
    }
};
