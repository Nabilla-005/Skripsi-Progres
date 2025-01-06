<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota_grup extends Model
{
    use HasFactory;
    // Menentukan nama tabel jika berbeda dari nama model (optional)
    protected $table = 'anggota_grup';

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = ['id_grup', 'id_user'];

    // Menentukan kolom id_anggota sebagai primary key
    protected $primaryKey = 'id_anggota';

    // Menentukan kolom yang tidak boleh diisi secara massal (optional)
    protected $guarded = ['id_anggota'];

    // Relasi dengan model GrupChat
    public function grup()
    {
        return $this->belongsTo(GrupChat::class, 'id_grup');
    }

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
