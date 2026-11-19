<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sin rol
        User::factory()->create([
            'name' => 'Administrador',
            'email' => config('app.admin.email'),
            'password' => '1234',
        ]);

        // rol => administrativa
        User::factory()->create([
            'name' => 'Administrativa',
            'email' => 'administrativa@test.com',
            'rol' => 'administrativa',
            'password' => '1234',
        ]);

        // rol => jefe
        User::factory()->create([
            'name' => 'Jefe',
            'email' => 'jefe@test.com',
            'rol' => 'jefe',
            'password' => '1234',
        ]);
    }
}
