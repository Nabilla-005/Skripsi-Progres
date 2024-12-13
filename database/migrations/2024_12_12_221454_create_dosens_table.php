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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id('id_dosen'); // Kolom id_dosen sebagai Primary Key
            $table->string('nip', 20)->unique(); // Kolom nip dengan panjang 20 karakter dan unik
            $table->string('nama', 100); // Kolom nama dosen
            $table->string('fakultas', 100); // Kolom fakultas dosen
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
        Schema::dropIfExists('dosens');
    }
};
