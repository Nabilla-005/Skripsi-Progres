<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nip' => $this->faker->unique()->randomNumber(10),
            'nama' =>$this->faker-->name(),
            'fakultas' => $this->faker->randomElement(['Teknik Mesin', 'Teknik Industri', 'Sistem Informasi', 'Informatika']),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password123'),
        ];
    }
}
