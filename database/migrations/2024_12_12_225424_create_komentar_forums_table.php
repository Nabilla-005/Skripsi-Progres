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
        Schema::create('komentar_forums', function (Blueprint $table) {
            $table->id('id_komentar'); // Kolom id_komentar sebagai Primary Key
            $table->unsignedBigInteger('id_forum'); 
            $table->foreign('id_forum')->references('id_forum')->on('forum_diskusis')->onDelete('cascade');
            $table->unsignedBigInteger('id_user'); 
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->text('isi'); // Kolom isi untuk menyimpan isi komentar
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
        Schema::dropIfExists('komentar_forums');
    }
};
