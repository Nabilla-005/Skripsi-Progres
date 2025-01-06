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
        Schema::create('grup_chat', function (Blueprint $table) {
            $table->id('id_grup'); // Kolom id_grup sebagai Primary Key
            $table->string('nama_grup', 100); // Kolom nama_grup untuk nama grup chat
            $table->unsignedBigInteger('id_pembuat');
            $table->foreign('id_pembuat')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('tanggal_dibuat'); // Kolom tanggal_dibuat untuk waktu pembuatan grup chat
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
        Schema::dropIfExists('grup_chats');
    }
};
