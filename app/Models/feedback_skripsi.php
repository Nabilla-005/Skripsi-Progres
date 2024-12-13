<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback_skripsi extends Model
{
    use HasFactory;
     // Menentukan nama tabel jika berbeda dari nama model (optional)
     protected $table = 'feedback_skripsis';

     // Menentukan kolom yang bisa diisi secara massal
     protected $fillable = ['id_progres', 'komentar', 'penilaian'];
 
     // Menentukan kolom id_feedback sebagai primary key
     protected $primaryKey = 'id_feedback';
 
     // Relasi dengan model ProgresSkripsi (Many to One)
     public function progresSkripsi()
     {
         return $this->belongsTo(ProgresSkripsi::class, 'id_progres', 'id_progres');
        } 
}
