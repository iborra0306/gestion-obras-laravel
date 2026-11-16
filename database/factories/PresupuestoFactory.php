<?php

namespace Database\Factories;

use App\Models\Presupuesto;
use App\Models\Cliente ;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Presupuesto>
 */
class PresupuestoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha'      => fake()->dateTimeBetween('-1 year')->format('Y-m-d'),
            'cliente_id' => Cliente::factory(),
            'obra_id'    => null,
            'iva'        => 21,
            'estado'     => 'no_aprobado',
        ];
    }
}
