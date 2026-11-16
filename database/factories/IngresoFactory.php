<?php

namespace Database\Factories;

use App\Models\Ingreso;
use App\Models\Obra;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ingreso>
 */
class IngresoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'obra_id' => Obra::factory(),
            'tipo'    => 'Transferencia',
            'fecha'   => fake()->dateTimeBetween('-1 year')->format('Y-m-d'),
            'importe' => fake()->randomFloat(2, 100, 200),
        ];
    }
}
