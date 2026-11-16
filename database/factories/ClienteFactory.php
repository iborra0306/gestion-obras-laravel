<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'     => fake()->firstName(),
            'apellidos'  => fake()->lastName(),
            'nif'        => fake()->unique()->numerify('########') . fake()->randomLetter(),
            'direccion'  => fake()->streetAddress(),
            'cod_postal' => fake()->numerify('#####'),
            'telefono'   => fake()->numerify('6########'),
        ];
    }
}
