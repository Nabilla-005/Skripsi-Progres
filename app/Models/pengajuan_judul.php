<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_judul extends Model
{
    use HasFactory;
     // Menentukan nama tabel jika berbeda dari nama model (optional)
     protected $table = 'pengajuan_juduls';

     // Menentukan kolom yang bisa diisi secara massal
     protected $fillable = ['id_mahasiswa', 'judul', 'deskripsi', 'file_path', 'status'];
 
     // Menentukan kolom id_pengajuan sebagai primary key
     protected $primaryKey = 'id_pengajuan';
 
     // Relasi dengan model Mahasiswa (Many to One)
     public function mahasiswa()
     {
         return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
        } 
}
