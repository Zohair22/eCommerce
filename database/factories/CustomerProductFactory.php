<?php

namespace Database\Factories;

use App\Models\CustomerProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CustomerProduct>
 */
class CustomerProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => $this->faker->unique()->numberBetween(1, 10),
            'product_id' => $this->faker->unique(['customer_id', 'product_id'])->numberBetween(1, 10),
            'quantity' => $this->faker->numberBetween(1, 3),
        ];
    }
}
