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
        Schema::create('feedback_skripsis', function (Blueprint $table) {
            $table->id('id_feedback'); // Kolom id_feedback sebagai Primary Key
            $table->unsignedBigInteger('id_progres'); 
            $table->foreign('id_progres')->references('id_progres')->on('progres_skripsis')->onDelete('cascade');
            $table->text('komentar'); // Kolom komentar untuk menyimpan komentar feedback
            $table->integer('penilaian'); // Kolom penilaian untuk menyimpan nilai feedback (misalnya skala 1-10)
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
        Schema::dropIfExists('feedback_skripsis');
    }
};
