<?php

namespace Database\Factories;

use App\Models\ParteProveedor;
use App\Models\Proveedor;
use App\Models\Obra;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ParteProveedor>
 */
class ParteProveedorFactory extends Factory
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
            'proveedor_id' => Proveedor::factory(),
            'fecha' => fake()->dateTimeBetween('-1 year')->format('Y-m-d'),
            'descripcion' => fake()->sentence(),
            'documento' => fake()->bothify('FAC-####'),
            'importe' => fake()->randomFloat(2, 50, 1000),
            'estado_pago' => 'pendiente',
        ];
    }
}
