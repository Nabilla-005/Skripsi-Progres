<?php

namespace App\Models;

use App\Models\pengajuan_judul;
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

    // Relasi ke tabel progres_skripsis (banyak progres untuk satu mahasiswa)
    public function progresSkripsis()
    {
        return $this->hasMany(ProgresSkripsi::class, 'id_mahasiswa');
    }

    // Relasi ke tabel pengajuan_juduls (banyak pengajuan untuk satu mahasiswa)
    public function pengajuanJuduls()
{
    return $this->hasMany(PengajuanJudul::class, 'id_mahasiswa');
}
}
