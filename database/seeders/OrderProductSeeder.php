<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderProduct;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order_products = [
          [
            'order_id' => '1',
            'product_id' => '1',
            'discount_price' => '1',
          ],
          [
            'order_id' => '2',
            'product_id' => '1',
            'discount_price' => '1',
          ],
          [
            'order_id' => '3',
            'product_id' => '1',
            'discount_price' => '1',
          ],
          [
            'order_id' => '4',
            'product_id' => '1',
            'discount_price' => '1',
          ],
          [
            'order_id' => '5',
            'product_id' => '1',
            'discount_price' => '1',
          ],
          [
            'order_id' => '6',
            'product_id' => '1',
            'discount_price' => '1',
          ],
          [
            'order_id' => '7',
            'product_id' => '1',
            'discount_price' => '1',
          ],
          [
            'order_id' => '8',
            'product_id' => '1',
            'discount_price' => '1',
          ],
          [
            'order_id' => '9',
            'product_id' => '1',
            'discount_price' => '1',
          ],
          [
            'order_id' => '10',
            'product_id' => '1',
            'discount_price' => '1',
          ],
          [
            'order_id' => '11',
            'product_id' => '1',
            'discount_price' => '1',
          ],
        ];

        OrderProduct::insert($order_products);
    }
}