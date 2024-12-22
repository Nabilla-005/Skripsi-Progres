<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    use HasFactory;
     // Menentukan nama tabel jika berbeda dari nama model (optional)
     protected $table = 'dosens';

     // Menentukan kolom yang bisa diisi secara massal
     protected $fillable = ['nip', 'nama', 'fakultas', 'email', 'password'];
 
     // Menentukan kolom id_dosen sebagai primary key
     protected $primaryKey = 'id_dosen';

     public function jadwalKosong()
    {
        return $this->hasMany(Jadwalkosong::class, 'id_dosen');
    }
 
     // Menonaktifkan auto-increment untuk primary key jika tidak ingin menggunakan auto-increment
     // public $incrementing = false;
 
     // Jika Anda ingin mengenkripsi password secara otomatis saat di-save (gunakan mutator)
}
