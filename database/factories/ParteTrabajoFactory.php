<?php

namespace Database\Factories;

use App\Models\ParteTrabajo;
use App\Models\Obra;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ParteTrabajo>
 */
class ParteTrabajoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'obra_id'     => Obra::factory(),
            'fecha'       => fake()->dateTimeBetween('-1 year')->format('Y-m-d'),
            'descripcion' => fake()->sentence(),
        ];
    }
}
