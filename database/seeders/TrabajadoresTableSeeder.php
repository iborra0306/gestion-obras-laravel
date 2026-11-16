<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Trabajador;
use Illuminate\Database\Seeder;

class TrabajadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trabajador::factory(20)->create();
    }
}
