<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Falta;
use App\Models\Trabajador;

class FaltasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /// De 0 a 4 faltas por cada trabajador
        foreach (Trabajador::all() as $t) {
            Falta::factory(rand(0, 4))->create(['trabajador_id' => $t->id]);
        }
    }
}
