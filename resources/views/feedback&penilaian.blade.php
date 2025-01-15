<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback_skripsi extends Model
{
    use HasFactory;

    // Tabel yang digunakan (opsional, karena Laravel sudah bisa mendeteksi ini)
    protected $table = 'feedback_skripsis';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'id_progres',
        'komentar',
        'penilaian',
    ];

    // Kolom yang tidak boleh diubah secara massal
    protected $guarded = ['id_feedback']; // 'id_feedback' tidak boleh diisi secara massal

    // Menetapkan relasi dengan tabel ProgresSkripsi
    public function progres()
    {
        return $this->belongsTo(ProgresSkripsi::class, 'id_progres', 'id_progres');
    }

    // Menetapkan relasi kebalikannya, yaitu ke Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsToThrough(mahasiswa::class, ProgresSkripsi::class);
    }

    // Jika diperlukan, Anda bisa menambahkan aksesori untuk manipulasi data sebelum disimpan atau ditampilkan
    // Misalnya: untuk format penilaian atau komentar
}