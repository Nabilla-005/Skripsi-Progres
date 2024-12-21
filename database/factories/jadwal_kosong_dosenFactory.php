<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\jadwal_kosong_dosen>
 */
class jadwal_kosong_dosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'id_jadwal_kosong'=>$this->faker->unique()->randomNumber(3),
          'id_dosen'=>$this->faker->unique()->randomNumber(10), 
          'tanggal'=>$this->faker->date(),
          'waktu_mulai'=>$this->faker->time('H:i:s'),
          'waktu_selesai'=>$this->faker->time('H:i:s'),
          'status'=>$this->faker->randomElement(['tersedia', 'penuh']),
        ];
    }
}
