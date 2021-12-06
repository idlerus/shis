<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'shortDesc' => $this->faker->paragraph(3),
            'fullDesc' => $this->faker->paragraph(30),
            'brand' => $this->faker->lastName(),
            'country' => $this->faker->country(),
        ];
    }
}
