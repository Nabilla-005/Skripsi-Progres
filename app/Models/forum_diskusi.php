<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum_diskusi extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dari nama model (optional)
    protected $table = 'forum_diskusis';

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = ['id_pembuat', 'judul', 'kategori', 'tanggal_dibuat'];

    // Menentukan kolom id_forum sebagai primary key
    protected $primaryKey = 'id_forum';

    // Relasi dengan model User (Many to One)
    public function pembuat()
    {
        return $this->belongsTo(User::class, 'id_pembuat','id');
    }
}
