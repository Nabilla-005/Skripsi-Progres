<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_judul extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_juduls'; // Nama tabel
    protected $primaryKey = 'id_pengajuan'; // Primary Key
    public $timestamps = true; // Aktifkan timestamps jika tabel menggunakan created_at dan updated_at

    protected $fillable = [
        'id_mahasiswa',
        'judul',
        'deskripsi',
        'file_path',
        'status',
    ];

    /**
     * Relasi ke model Mahasiswa.
     */
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
}
}