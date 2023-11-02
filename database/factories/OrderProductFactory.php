<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderProduct;

class OrderProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => $this->faker->order_id,
            'product_id' => $this->faker->product_id,
            'discount_price' => $this->faker->discount_price,
        ];
    }
}
