<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal_kosong_dosen extends Model
{
    use HasFactory;
    // Menentukan nama tabel jika berbeda dari nama model (optional)
    protected $table = 'jadwal_kosong_dosens';

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = ['id_dosen', 'tanggal', 'waktu_mulai', 'waktu_selesai', 'status'];

    // Menentukan kolom id_jadwal_kosong sebagai primary key
    protected $primaryKey = 'id_jadwal_kosong';

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }
}
