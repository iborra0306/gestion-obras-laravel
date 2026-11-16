<?php

namespace Database\Factories;

use App\Models\LineaPresupuesto;
use App\Models\Presupuesto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LineaPresupuesto>
 */
class LineaPresupuestoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'presupuesto_id' => Presupuesto::factory(),
            'descripcion'    => fake()->sentence(4),
            'uds'            => fake()->numberBetween(1, 10),
            'precio'         => fake()->randomFloat(2, 10, 500),
        ];
    }
}
