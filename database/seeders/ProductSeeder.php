<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for products table
        $products = [
          [
            'name' => 'iPhone 13 (128GB) - Midnight',
            'price' => '630.00',
            'brand' => 'Apple',
            'stock' => '23',
          ],
          [
            'name' => 'Portable Monitor, S1 Table 15.6 1080P FHD Laptop Monitor',
            'price' => '120.00',
            'brand' => 'ARZOPA',
            'stock' => '11',
          ],
          [
            'name' => 'Elite 10 Wireless In-Ear Bluetooth Earbuds',
            'price' => '260.99',
            'brand' => 'Jabra',
            'stock' => '57',
          ],
          [
            'name' => 'OLED evo C3 42" 4K Smart TV, 2023',
            'price' => '1090.99',
            'brand' => 'LG',
            'stock' => '356',
          ],
          [
            'name' => 'Bedside Lamps, Table Lamp for Bedroom',
            'price' => '23.99',
            'brand' => 'Aooshine',
            'stock' => '88',
          ],
          [
            'name' => ' Dash Cam for Cars Front and Rear',
            'price' => '48.99',
            'brand' => 'ORSKEY',
            'stock' => '12',
          ],
          [
            'name' => 'Smart Electric Heater, Low Energy Efficient',
            'price' => '55.99',
            'brand' => 'Goveelife',
            'stock' => '233',
          ],
          [
            'name' => 'Upright Vacuum Cleaner',
            'price' => '205.99',
            'brand' => 'Shark',
            'stock' => '44',
          ],
          [
            'name' => 'Water GoZero Daily Insulated Bottle',
            'price' => '17.99',
            'brand' => 'PHILIPS',
            'stock' => '21',
          ],
          [
            'name' => 'Electric Table Desk Height Adjustable Desk',
            'price' => '237.99',
            'brand' => 'POKAR',
            'stock' => '72',
          ],
        ];

        // Insert the product records into the product table
        Product::insert($products);
    }
}