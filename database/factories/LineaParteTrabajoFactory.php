<?php

namespace Database\Factories;

use App\Models\LineaParteTrabajo;
use App\Models\ParteTrabajo;
use App\Models\Trabajador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LineaParteTrabajo>
 */
class LineaParteTrabajoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parte_trabajo_id' => ParteTrabajo::factory(),
            'trabajador_id'    => Trabajador::factory(),
            'horas'            => fake()->numberBetween(1, 8),
        ];
    }
}
