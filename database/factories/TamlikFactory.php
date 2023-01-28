<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tamlik>
 */
class TamlikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "serial_number" => fake()->unique()->numberBetween(1,9999999),
            "book_number" => fake()->numberBetween(100,999999),
            "name" => fake()->name(),
            "piece_number" => fake()->numberBetween(1,2654)
        ];
    }
}
