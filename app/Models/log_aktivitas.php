<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_aktivitas extends Model
{
    use HasFactory;
      // Menentukan nama tabel jika berbeda dari nama model (optional)
      protected $table = 'log_aktivitas';

      // Menentukan kolom yang bisa diisi secara massal
      protected $fillable = ['id_pengguna', 'jenis_aktivitas', 'waktu_aktivitas'];
  
      // Menentukan kolom id_log sebagai primary key
      protected $primaryKey = 'id_log';
  
      // Relasi dengan model Pengguna (bisa admin, mahasiswa, atau dosen)
      public function pengguna()
      {
          return $this->belongsTo(User::class, 'id_pengguna');
        }  
}
