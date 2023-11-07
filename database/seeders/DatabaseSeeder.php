<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $this->call([
        // Seeds these tables with the data defined in their seedersa
        CustomerSeeder::class,
        OrderSeeder::class,
        ProductSeeder::class,
        OrderProductSeeder::class
    ]);
    }
}