<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name(),
            'slug' => $this->faker->unique()->slug(),
            'description' => $this->faker->paragraphs('3', true),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'stock' => $this->faker->randomDigit,
            'discount' => $this->faker->randomFloat(2, -1, 50),
            'category_id' => $this->faker->numberBetween(1, 20),
            'user_id' => $this->faker->numberBetween(1, 4),
            'created_at' =>  $this->faker->dateTimeBetween('-3 year', Carbon::now()),
        ];
    }
}
