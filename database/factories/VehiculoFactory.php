<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehiculo>
 */
class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'placa' => $this->faker->regexify('[A-Z]{3}[0-9]{3}'),
            'estilo' => $this->faker->word(),
            'marca' => $this->faker->randomElement(['Mazda', 'Mercedes Benz', 'Volkswagen', 'Chevrolet', 'Renault']),
            'modelo' => $this->faker->numberBetween(1991, 2022),
            'user_id'=> $this->faker->randomElement(User::select('id')->get()),
        ];
    }
}
