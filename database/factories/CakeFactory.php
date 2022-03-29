<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cake>
 */
class CakeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id'    => $this->faker->unique()->numberBetween(1, 999),
            'name' => $this->faker->name,
            'weight' => $this->faker->numberBetween(100, 1000),
            'price' => $this->faker->numberBetween(100, 1000),
            'available_quantity' => $this->faker->randomNumber(2)
        ];
    }
}
