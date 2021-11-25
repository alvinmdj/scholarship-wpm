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
            'ipk' => $this->faker->randomFloat(2, 3.5, 4),
            'ips' => $this->faker->randomFloat(2, 3.5, 4),
            'pendapatan_ortu' => $this->faker->numberBetween(1000000, 100000000),
            'jumlah_saudara' => $this->faker->numberBetween(1, 5),
            'foto' => 'default.jpg'
        ];
    }
}
