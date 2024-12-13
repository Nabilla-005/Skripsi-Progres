<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statistik_sistem extends Model
{
    use HasFactory;
     // Menentukan nama tabel jika berbeda dari nama model (optional)
     protected $table = 'statistik_sistems';

     // Menentukan kolom yang bisa diisi secara massal
     protected $fillable = ['total_mahasiswa', 'total_dosen', 'total_jadwal'];
 
     // Menentukan kolom id_statistik sebagai primary key
     protected $primaryKey = 'id_statistik'; 
}
