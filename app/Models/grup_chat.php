<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grup_chat extends Model
{
    use HasFactory;
      // Menentukan nama tabel jika berbeda dari nama model (optional)
      protected $table = 'grup_chat';

      // Menentukan kolom yang bisa diisi secara massal
      protected $fillable = ['nama_grup', 'id_pembuat', 'tanggal_dibuat'];
  
      // Menentukan kolom id_grup sebagai primary key
      protected $primaryKey = 'id_grup';
  
      // Menentukan kolom yang tidak boleh diisi secara massal (optional)
      protected $guarded = ['id_grup'];
  
      // Relasi dengan model User untuk pembuat grup
      public function pembuat()
      {
          return $this->belongsTo(User::class, 'id_pembuat');
        }  
}
