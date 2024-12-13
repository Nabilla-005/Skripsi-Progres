<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat_personal extends Model
{
    use HasFactory;
     // Menentukan nama tabel jika berbeda dari nama model (optional)
     protected $table = 'chat_personal';

     // Menentukan kolom yang bisa diisi secara massal
     protected $fillable = ['id_pengirim', 'id_penerima', 'isi_pesan', 'waktu_kirim', 'status_baca'];
 
     // Menentukan kolom id_pesan sebagai primary key
     protected $primaryKey = 'id_pesan';
 
     // Menentukan kolom yang tidak boleh diisi secara massal (optional)
     protected $guarded = ['id_pesan'];
 
     // Relasi dengan tabel users untuk pengirim dan penerima
     public function pengirim()
     {
         return $this->belongsTo(User::class, 'id_pengirim');
     }
 
     public function penerima()
     {
         return $this->belongsTo(User::class, 'id_penerima');
        } 
}
