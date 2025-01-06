<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikSistem extends Model
{
    use HasFactory;

    protected $table = 'statistik_sistems';

    protected $fillable = [
        'total_mahasiswa',
        'total_dosen',
        'total_jadwal',
    ];
}

