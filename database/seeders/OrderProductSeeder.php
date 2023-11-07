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
        // Sample data for order_product table
        $order_products = [
          [
            'order_id' => '1',
            'product_id' => '1',
            'discount_price' => '12.99',
          ],
          [
            'order_id' => '1',
            'product_id' => '5',
            'discount_price' => '708.99',
          ],
          [
            'order_id' => '1',
            'product_id' => '9',
            'discount_price' => '17.99',
          ],
          [
            'order_id' => '2',
            'product_id' => '2',
            'discount_price' => '130.99',
          ],
          [
            'order_id' => '2',
            'product_id' => '3',
            'discount_price' => '38.99',
          ],
          [
            'order_id' => '2',
            'product_id' => '4',
            'discount_price' => '60.00',
          ],
          [
            'order_id' => '3',
            'product_id' => '7',
            'discount_price' => '130.99',
          ],
          [
            'order_id' => '3',
            'product_id' => '8',
            'discount_price' => '174.99',
          ],
          [
            'order_id' => '4',
            'product_id' => '3',
            'discount_price' => '38.99',
          ],
          [
            'order_id' => '5',
            'product_id' => '1',
            'discount_price' => '12.99',
          ],
          [
            'order_id' => '5',
            'product_id' => '5',
            'discount_price' => '708.99',
          ],
          [
            'order_id' => '5',
            'product_id' => '9',
            'discount_price' => '17.99',
          ],
          [
            'order_id' => '6',
            'product_id' => '10',
            'discount_price' => '28.99',
          ],
          [
            'order_id' => '6',
            'product_id' => '3',
            'discount_price' => '38.99',
          ],
          [
            'order_id' => '6',
            'product_id' => '6',
            'discount_price' => '390.99',
          ],
          [
            'order_id' => '7',
            'product_id' => '1',
            'discount_price' => '12.99',
          ],
          [
            'order_id' => '7',
            'product_id' => '7',
            'discount_price' => '130.99',
          ],
          [
            'order_id' => '8',
            'product_id' => '2',
            'discount_price' => '130.99',
          ],
          [
            'order_id' => '8',
            'product_id' => '10',
            'discount_price' => '28.99',
          ],
          [
            'order_id' => '9',
            'product_id' => '3',
            'discount_price' => '38.99',
          ],
          [
            'order_id' => '9',
            'product_id' => '5',
            'discount_price' => '708.99',
          ],
          [
            'order_id' => '9',
            'product_id' => '7',
            'discount_price' => '130.99',
          ],
          [
            'order_id' => '10',
            'product_id' => '4',
            'discount_price' => '60.00',
          ],
          [
            'order_id' => '10',
            'product_id' => '8',
            'discount_price' => '174.99',
          ],
        ];

        // Insert the order_product records into the database
        OrderProduct::insert($order_products);
    }
}