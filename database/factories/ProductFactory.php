<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
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
            'title' => fake()->word(),
            'thumbnail' => $this->faker->fixturesImage('products', 'images/products' ),
            'price' => fake()->randomFloat(2, 500, 20000),
            'description' => fake()->paragraph(),
            'brand_id' => Brand::all()->random(),
        
        ];
    }
}
