<?php

namespace Database\Factories;

use App\Models\Extintor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recarga>
 */
class RecargaFactory extends Factory
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
            'proximarecarga' => fake()->date(),
        ];
    }
}
