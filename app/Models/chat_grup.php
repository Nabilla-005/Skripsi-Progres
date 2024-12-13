<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat_grup extends Model
{
    use HasFactory;
     // Menentukan nama tabel jika berbeda dari nama model (optional)
     protected $table = 'chat_grup';

     // Menentukan kolom yang bisa diisi secara massal
     protected $fillable = ['id_grup', 'id_pengirim', 'isi_pesan', 'waktu_kirim'];
 
     // Menentukan kolom id_pesan sebagai primary key
     protected $primaryKey = 'id_pesan';
 
     // Menentukan kolom yang tidak boleh diisi secara massal (optional)
     protected $guarded = ['id_pesan'];
 
     // Relasi dengan tabel Grup
     public function grup()
     {
         return $this->belongsTo(Grup::class, 'id_grup');
     }
 
     // Relasi dengan tabel Users untuk pengirim
     public function pengirim()
     {
         return $this->belongsTo(User::class, 'id_pengirim');
        }
}
