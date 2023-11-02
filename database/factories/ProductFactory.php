<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->price,
            'brand' => $this->faker->brand,
            'stock' => $this->faker->stock,
        ];
    }
}
