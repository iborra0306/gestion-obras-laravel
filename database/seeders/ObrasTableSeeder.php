<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Especialista;
use App\Models\Ingreso;
use App\Models\LineaParteTrabajo;
use App\Models\LineaPresupuesto;
use App\Models\Obra;
use App\Models\ParteEspecialista;
use App\Models\ParteProveedor;
use App\Models\ParteTrabajo;
use App\Models\Presupuesto;
use App\Models\Proveedor;
use App\Models\Trabajador;
use Illuminate\Database\Seeder;

class ObrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = Cliente::all();
        $trabajadores = Trabajador::all();
        $proveedores = Proveedor::all();
        $especialistas = Especialista::all();

        for ($i = 0; $i < 20; $i++) {
            // Obra de un cliente ya existente
            $obra = Obra::factory()->create(['cliente_id' => $clientes->random()->id]);

            // Presupuesto aprobado de ese cliente, vinculado a la obra
            $presupuesto = Presupuesto::factory()->create([
                'cliente_id' => $obra->cliente_id,
                'obra_id'    => $obra->id,
                'estado'     => 'aprobado',
            ]);

            // De 3 a 6 líneas de ese presupuesto
            LineaPresupuesto::factory(rand(3, 6))->create(['presupuesto_id' => $presupuesto->id]);

            // Total del presupuesto: Σ (uds × precio) × (1 + iva / 100)
            $lineas = LineaPresupuesto::where('presupuesto_id', $presupuesto->id)->get();
            $total = round($lineas->sum('total_linea') * (1 + $presupuesto->iva / 100), 2);

            // Partes de trabajo (2 a 5), cada uno con 2 a 4 trabajadores
            $numPartes = rand(2, 5);
            for ($j = 0; $j < $numPartes; $j++) {
                $parte = ParteTrabajo::factory()->create(['obra_id' => $obra->id]);

                foreach ($trabajadores->random(rand(2, 4)) as $t) {
                    LineaParteTrabajo::factory()->create([
                        'parte_trabajo_id' => $parte->id,
                        'trabajador_id'    => $t->id,
                    ]);
                }
            }

            // Partes de proveedor (1 a 3), con importe del 5 % al 15 % del total
            $numProveedor = rand(1, 3);
            for ($j = 0; $j < $numProveedor; $j++) {
                ParteProveedor::factory()->create([
                    'obra_id'      => $obra->id,
                    'proveedor_id' => $proveedores->random()->id,
                    'importe'      => round($total * rand(5, 15) / 100, 2),
                ]);
            }

            // Partes de especialista (1 o 2), con importe del 5 % al 15 % del total
            $numEspecialista = rand(1, 2);
            for ($j = 0; $j < $numEspecialista; $j++) {
                ParteEspecialista::factory()->create([
                    'obra_id'         => $obra->id,
                    'especialista_id' => $especialistas->random()->id,
                    'importe'         => round($total * rand(5, 15) / 100, 2),
                ]);
            }

            // Ingresos (0 a 3): cada uno es un porcentaje de lo que queda pendiente
            $pendiente = $total;
            $numIngresos = rand(0, 3);
            for ($k = 0; $k < $numIngresos; $k++) {
                $importe = round($pendiente * rand(10, 50) / 100, 2);

                Ingreso::factory()->create([
                    'obra_id' => $obra->id,
                    'importe' => $importe,
                ]);

                $pendiente -= $importe;
            }
        }
    }
}