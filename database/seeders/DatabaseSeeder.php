<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Customer;
use App\Models\CustomerProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(4)->create();
         Category::factory(20)->create();
         Product::factory(200)->create();
         Customer::factory(10)->create();
         CustomerProduct::factory(10)->create();
    }
}
