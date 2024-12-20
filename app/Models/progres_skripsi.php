<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class progres_skripsi extends Model
{
    use HasFactory;

    protected $table = 'progres_skripsis'; // Nama tabel
    protected $primaryKey = 'id_progres'; // Primary Key
    public $timestamps = true; // Aktifkan timestamps jika tabel menggunakan created_at dan updated_at

    protected $fillable = [
        'id_mahasiswa',
        'file_path',
        'komentar',
        'tanggal_upload',
    ];

    /**
     * Relasi ke model Mahasiswa.
     */
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    /**
     * Relasi ke feedback skripsi.
     */
    public function feedbacks()
    {
        return $this->hasMany(feedback_skripsi::class, 'id_progres', 'id_progres');}
}
