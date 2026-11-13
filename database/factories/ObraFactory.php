<?php

namespace Database\Factories;

use App\Models\Obra;
use App\Models\Gasto;
use App\Models\Cliente ;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Obra>
 */
class ObraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descripcion' => 'Reforma de ' . fake()->word(),
            'cliente_id' => Cliente::factory(),
        ];
    }

    /**
     * Configure the model factory.
     *
     * Toda obra creada con la factory tiene su ficha de Gastos.
     */
    public function configure(): static
    {
        return $this->afterCreating(fn (Obra $obra) => Gasto::create(['obra_id' => $obra->id]));
    }
}
