<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'descripition' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 12, 150000),
            'photo' => $this->faker->url(),
            'category_id' => 1,
            'quantity' =>  $this->faker->randomFloat(2, 12, 150000),
        ];
    }
}