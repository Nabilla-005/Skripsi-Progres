<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_jadwal_bimbingan extends Model
{
    use HasFactory;
     // Menentukan nama tabel jika berbeda dari nama model (optional)
     protected $table = 'pengajuan_jadwal_bimbingans';

     // Menentukan kolom yang bisa diisi secara massal
     protected $fillable = ['id_mahasiswa', 'id_jadwal_kosong', 'status_pengajuan', 'catatan_dosen', 'tanggal_pengajuan'];
 
     // Menentukan kolom id_pengajuan sebagai primary key
     protected $primaryKey = 'id_pengajuan';
 
     // Relasi dengan model Mahasiswa (Many to One)
     public function mahasiswa()
     {
         return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
     }
 
     // Relasi dengan model JadwalKosongDosen (Many to One)
     public function jadwalKosong()
     {
         return $this->belongsTo(JadwalKosongDosen::class, 'id_jadwal_kosong', 'id_jadwal_kosong');
        }
}
