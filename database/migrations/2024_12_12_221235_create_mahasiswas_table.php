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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id('id_mahasiswa'); // Kolom id_mahasiswa sebagai Primary Key
            $table->string('nim', 20)->unique(); // Kolom nim dengan panjang 20 karakter dan unik
            $table->string('nama', 100); // Kolom nama mahasiswa
            $table->string('program_studi', 100); // Kolom program studi
            $table->string('email', 100)->unique(); // Kolom email yang unik
            $table->string('password'); // Kolom password (hashed)
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
        Schema::dropIfExists('mahasiswas');
    }
};
