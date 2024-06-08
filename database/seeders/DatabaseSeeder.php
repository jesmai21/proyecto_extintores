<?php

namespace Database\Seeders;

use App\Models\Extintor;
use App\Models\Inspeccion;
use App\Models\Proveedor;
use App\Models\Recarga;
use App\Models\Tipo;
use App\Models\Ubicacion;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Ubicacion::factory(30)->create();
        Proveedor::factory(30)->create();
        Tipo::factory(30)->create();
        Extintor::factory(30)->create();
        Inspeccion::factory(30)->create();
        Recarga::factory(30)->create();
    }
}
