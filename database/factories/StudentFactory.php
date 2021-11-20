<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'nim' => $this->faker->randomNumber(5, true),
            'alamat' => $this->faker->address(),
            'ipk' => $this->faker->randomFloat(2, 1, 4),
            'ips' => $this->faker->randomFloat(2, 1, 4),
            'pendapatan_ortu' => $this->faker->numberBetween(1000000, 100000000),
            'jumlah_saudara' => $this->faker->numberBetween(0, 5),
            'biaya_hidup' => $this->faker->numberBetween(500000, 10000000),
            'foto' => 'photos/default.jpg'
        ];
    }
}
