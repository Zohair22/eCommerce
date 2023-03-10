<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

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
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->sentences('3', true),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'stock' => $this->faker->randomDigit,
            'discount' => $this->faker->randomFloat(2, -1, 50),
            'category_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 4),
            'created_at' =>  $this->faker->dateTimeBetween('-3 year', Carbon::now()),
        ];
    }
}
