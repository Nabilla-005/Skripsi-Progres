<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    /**
     * Relationship to fetch additional profile data based on user status.
     */
    public function profile()
    {
        if ($this->status === 'dosen') {
            return $this->hasOne(Dosen::class, 'email', 'email');
        } elseif ($this->status === 'mahasiswa') {
            return $this->hasOne(Mahasiswa::class, 'email', 'email');
        } elseif ($this->status === 'admin') {
            return $this->hasOne(Admin::class, 'email', 'email');
        }
        

        return null;
    }

    public function dosen()
    {
        // Menghubungkan User dengan Dosen berdasarkan email
        return $this->hasOne(Dosen::class, 'email', 'email');
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'email', 'email');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'email', 'email');
    }


}
