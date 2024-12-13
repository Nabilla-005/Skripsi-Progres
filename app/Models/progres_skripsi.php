<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class progres_skripsi extends Model
{
    use HasFactory;
    // Menentukan nama tabel jika berbeda dari nama model (optional)
    protected $table = 'progres_skripsis';

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = ['id_mahasiswa', 'file_path', 'komentar', 'tanggal_upload'];

    // Menentukan kolom id_progres sebagai primary key
    protected $primaryKey = 'id_progres';

    // Relasi dengan model Mahasiswa (Many to One)
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }
}
