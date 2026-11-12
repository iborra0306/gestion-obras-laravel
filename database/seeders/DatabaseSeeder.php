<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Trabajador;
use App\Models\Proveedor;
use App\Models\Especialista;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        Cliente::factory(20)->create();
        Trabajador::factory(20)->create();
        Proveedor::factory(20)->create();
        Especialista::factory(20)->create();
    }
}
