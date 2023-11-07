<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for orders table
        $orders = [
          [
            'order_date' => '2023-04-12',
            'customer_id' => '1',
          ],
          [
            'order_date' => '2023-07-22',
            'customer_id' => '4',
          ],
          [
            'order_date' => '2023-08-22',
            'customer_id' => '2',
          ],
          [
            'order_date' => '2023-10-04',
            'customer_id' => '3',
          ],
          [
            'order_date' => '2023-02-01',
            'customer_id' => '5',
          ],
          [
            'order_date' => '2023-03-18',
            'customer_id' => '6',
          ],
          [
            'order_date' => '2023-09-12',
            'customer_id' => '7',
          ],
          [
            'order_date' => '2023-02-02',
            'customer_id' => '8',
          ],
          [
            'order_date' => '2023-07-04',
            'customer_id' => '9',
          ],
          [
            'order_date' => '2023-10-05',
            'customer_id' => '10',
          ],
        ];

        // Insert the order records into the database
        Order::insert($orders);
    }
}