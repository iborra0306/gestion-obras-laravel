<?php

namespace Database\Factories;

use App\Models\Trabajador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Trabajador>
 */
class TrabajadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo'                => 'Peon',
            'nombre'              => fake()->firstName(),
            'apellido'            => fake()->lastName(),
            'telefono'            => fake()->numerify('6########'),
            'coste_hora_estandar' => 20,
        ];
    }
}
