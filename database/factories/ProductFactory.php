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
            'title' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 1, 500),
            'quantity' => $this->faker->numberBetween(1, 100),
            'desc' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(640, 480, 'products', true), // Optional: URL for fake images
        ];
    }
}
