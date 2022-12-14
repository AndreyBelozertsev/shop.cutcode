<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductRaiting>
 */
class ProductRaitingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        if(! User::count() ) User::factory()->count(100)->create();
        return [
            'user_id' => User::all()->random(),
            'product_id' => Product::all()->random(),
            'votes' => fake()->numberBetween(1, 5),
            'created_at' => fake()->date('Y-m-d H:i:s'),
        ];
    }
}
