<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresSkripsi extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'progres_skripsis';

    // Nama primary key tabel
    protected $primaryKey = 'id_progres';

    // Menonaktifkan timestamps jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = true;

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'id_mahasiswa',
        'file_path',
        'komentar',
        'tanggal_upload',
    ];

    /**
     * Relasi ke model Mahasiswa.
     * Setiap progres_skripsi milik satu mahasiswa.
     */
    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    /**
     * Relasi ke feedback skripsi.
     * Setiap progres_skripsi bisa memiliki banyak feedback.
     */
    public function feedbacks()
    {
        return $this->hasMany(feedback_skripsi::class, 'id_progres', 'id_progres');
        // return $this->hasMany(FeedbackSkripsi::class, 'id_progres', 'id_progres');
    }
}