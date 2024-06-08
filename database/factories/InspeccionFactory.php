<?php

namespace Database\Factories;

use App\Models\Extintor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inspeccion>
 */
class InspeccionFactory extends Factory
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
            'idextintor' => Extintor::all()->random()->id,
            'fecha' => fake()->date(),
            'proximainspeccion' => fake()->date(),
        ];
    }
}
