<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    // Menentukan nama tabel jika berbeda dari nama model (optional)
    protected $table = 'admins';

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = ['nama', 'email', 'password'];

    // Kolom yang tidak bisa diisi secara massal (untuk melindungi kolom-kolom tertentu)
    // protected $guarded = ['id_admin'];

    // Menentukan bahwa kolom id_admin adalah primary key
    protected $primaryKey = 'id_admin';

    // Menonaktifkan auto-increment untuk primary key jika tidak ingin menggunakan auto-increment
    // public $incrementing = false;

    // Jika Anda ingin mengenkripsi password secara otomatis saat di-save (gunakan mutator)
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value); // Hash password menggunakan bcrypt
        }
}
