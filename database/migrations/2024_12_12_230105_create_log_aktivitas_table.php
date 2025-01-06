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
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->id('id_log'); // Kolom id_log sebagai Primary Key
            $table->unsignedBigInteger('id_pengguna'); // Kolom id_pengguna yang merujuk ke pengguna
            $table->string('jenis_aktivitas'); // Kolom jenis_aktivitas untuk mendeskripsikan aktivitas
            $table->dateTime('waktu_aktivitas'); // Kolom waktu_aktivitas untuk mencatat waktu aktivitas
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
        Schema::dropIfExists('log_aktivitas');
    }
};
