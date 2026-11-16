<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

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

        Model::unguard();
        Schema::disableForeignKeyConstraints();

        $this->call([
            ClientesTableSeeder::class,
            TrabajadoresTableSeeder::class,
            FaltasTableSeeder::class,
            ProveedoresTableSeeder::class,
            EspecialistasTableSeeder::class,
            ObrasTableSeeder::class,
        ]);

        Model::reguard();
        Schema::enableForeignKeyConstraints();
    }
}
