<?php

namespace Database\Factories;

use App\Models\ParteEspecialista;
use App\Models\Especialista;
use App\Models\Obra;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ParteEspecialista>
 */
class ParteEspecialistaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'obra_id'         => Obra::factory(),
            'especialista_id' => Especialista::factory(),
            'fecha'           => fake()->dateTimeBetween('-1 year')->format('Y-m-d'),
            'descripcion'     => fake()->sentence(),
            'documento'       => fake()->bothify('FAC-####'),
            'importe'         => fake()->randomFloat(2, 50, 1000),
            'estado_pago'     => 'pendiente',
        ];
    }
}
