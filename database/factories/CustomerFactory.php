<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

class CustomerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->first_name,
            'last_name' => $this->faker->last_name,
            'phone_number' => $this->faker->unique()->phone_number,
            'email' => $this->faker->unique()->email,
        ];
    }
}
