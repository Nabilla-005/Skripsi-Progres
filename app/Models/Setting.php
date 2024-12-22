<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';  // Nama tabel yang digunakan
    protected $fillable = ['key', 'value'];  // Kolom yang dapat diisi massal

    /**
     * Mendapatkan nilai pengaturan berdasarkan key
     */
    public static function getSetting($key)
    {
        return self::where('key', $key)->value('value');
    }

    /**
     * Mengupdate nilai pengaturan berdasarkan key
     */
    public static function updateSetting($key, $value)
    {
        $setting = self::where('key', $key)->first();
        if ($setting) {
            $setting->value = $value;
            $setting->save();
        } else {
            self::create(['key' => $key, 'value' => $value]);
        }
    }
}
