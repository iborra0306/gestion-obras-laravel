<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Trabajador;
use App\Models\Proveedor;
use App\Models\Especialista;
use App\Models\Obra;
use App\Models\Presupuesto;
use App\Models\LineaPresupuesto;
use App\Models\Ingreso;
use App\Models\ParteTrabajo;
use App\Models\LineaParteTrabajo;
use App\Models\ParteProveedor;
use App\Models\ParteEspecialista;
use App\Models\Falta;
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
        Obra::factory(20)->create();
        Presupuesto::factory(20)->create();
        LineaPresupuesto::factory(20)->create();
        Ingreso::factory(20)->create();
        ParteTrabajo::factory(20)->create();
        LineaParteTrabajo::factory(20)->create();
        ParteProveedor::factory(20)->create();
        ParteEspecialista::factory(20)->create();
        Falta::factory(20)->create();
    }
}
