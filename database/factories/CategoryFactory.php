<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
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
            'description' => $this->faker->paragraphs('4', true),
            'created_at' =>  $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
