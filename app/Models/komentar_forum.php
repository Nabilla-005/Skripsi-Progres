<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar_forum extends Model
{
    use HasFactory;

    // Menentukan nama tabel
    protected $table = 'komentar_forums';

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = ['id_forum', 'id_user', 'isi'];

    // Menentukan kolom id_komentar sebagai primary key
    protected $primaryKey = 'id_komentar';

    // Relasi dengan model User (Many to One)
    public function pengirim()
    {
        return $this->belongsTo(users::class, 'id_user', 'id_user');
    }

    // Relasi dengan model ForumDiskusi (Many to One)
    public function forum()
    {
        return $this->belongsTo(forum_diskusi::class, 'id_forum', 'id_forum');
    }
}
