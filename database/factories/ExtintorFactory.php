<?php

namespace Database\Factories;

use App\Models\Proveedor;
use App\Models\Tipo;
use App\Models\Ubicacion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Extintor>
 */
class ExtintorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'capacidad' => fake()->randomFloat(2, 1, 100),
            'fechafabricacion' => fake()->date(),
            'estado' => fake()->randomElement(['bueno','malo','regular']),
            'idtipo' => Tipo::all()->random()->id,
            'idubicacion' => Ubicacion::all()->random()->id,
            'idproveedor' => Proveedor::all()->random()->id,
        ];
    }
}
