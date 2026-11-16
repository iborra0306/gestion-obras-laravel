<?php

namespace Database\Factories;

use App\Models\Especialista;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Especialista>
 */
class EspecialistaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo'       => fake()->randomElement(['Arquitecto', 'Electricista']),
            'referencia' => fake()->bothify('ESP-####'),
            'nombre'     => fake()->name(),
            'telefono'   => fake()->numerify('6########'),
            'correo'     => fake()->safeEmail(),
        ];
    }
}
