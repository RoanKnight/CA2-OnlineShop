<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_date' => $this->faker->order_date,
            'customer_id' => $this->faker->customer_id,
        ];
    }
}
