<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
     // Menentukan nama tabel jika berbeda dari nama model (optional)
     protected $table = 'mahasiswas';

     // Menentukan kolom yang bisa diisi secara massal
     protected $fillable = ['nim', 'nama', 'program_studi', 'email', 'password'];
 
     // Menentukan kolom id_mahasiswa sebagai primary key
     protected $primaryKey = 'id_mahasiswa';
 
     // Menonaktifkan auto-increment untuk primary key jika tidak ingin menggunakan auto-increment
     // public $incrementing = false;
 
     // Jika Anda ingin mengenkripsi password secara otomatis saat di-save (gunakan mutator)
     public function setPasswordAttribute($value)
     {
         $this->attributes['password'] = bcrypt($value); // Hash password menggunakan bcrypt
         } 
}
