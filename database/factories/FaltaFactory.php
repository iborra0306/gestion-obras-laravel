<?php

namespace Database\Factories;

use App\Models\Falta;
use App\Models\Trabajador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Falta>
 */
class FaltaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $inicio = fake()->dateTimeBetween('-1 year')->format('Y-m-d');

        return [
            'trabajador_id' => Trabajador::factory(),
            'fecha_inicio'  => $inicio,
            'fecha_fin'     => date('Y-m-d', strtotime($inicio . ' +' . fake()->numberBetween(0, 10) . ' days')),
            'tipo'          => 'vacaciones',
            'motivo'        => fake()->sentence(),
        ];
    }
}
