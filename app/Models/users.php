<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
     // Menentukan kolom yang bisa diisi secara massal (mass assignment)
     protected $fillable = ['username', 'password', 'role'];

     // Menentukan relasi One-to-Many dengan model Article (contoh relasi)
     public function articles()
     {
         return $this->hasMany(Article::class);
     }
 
     // Mutator untuk mengenkripsi password sebelum disimpan
     public function setPasswordAttribute($value)
     {
         $this->attributes['password'] = bcrypt($value); // Menggunakan bcrypt untuk mengenkripsi password
     }
 
     // Accessor untuk mendapatkan full_name (jika ada first_name dan last_name)
     public function getFullNameAttribute()
     {
         return $this->first_name . ' ' . $this->last_name; // Menggabungkan first_name dan last_name
     }
  // Jika Anda ingin menonaktifkan timestamps (created_at dan updated_at)
    // public $timestamps = false;

    // Jika nama tabel di database tidak sesuai dengan konvensi Laravel (jamak, bentuk kecil)
    // protected $table = 'custom_table_name';
}
