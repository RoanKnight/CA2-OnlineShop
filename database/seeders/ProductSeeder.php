<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Order;

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
            'product_image' => 'iPhone13.png'
          ],
          [
            'name' => 'Portable Monitor, S1 Table 15.6 1080P FHD Laptop Monitor',
            'price' => '120.00',
            'brand' => 'ARZOPA',
            'stock' => '11',
            'product_image' => 'Portable-monitor.png'
            
          ],
          [
            'name' => 'Elite 10 Wireless In-Ear Bluetooth Earbuds',
            'price' => '260.99',
            'brand' => 'Jabra',
            'stock' => '57',
            'product_image' => 'Wireless-earphones.png'
          ],
          [
            'name' => 'OLED evo C3 42" 4K Smart TV, 2023',
            'price' => '1090.99',
            'brand' => 'LG',
            'stock' => '356',
            'product_image' => 'LG-C3.png'
          ],
          [
            'name' => 'Bedside Lamps, Table Lamp for Bedroom',
            'price' => '23.99',
            'brand' => 'Aooshine',
            'stock' => '88',
            'product_image' => 'Bedside-lamps.jpg'
          ],
          [
            'name' => 'Dash Cam for Cars Front and Rear',
            'price' => '48.99',
            'brand' => 'ORSKEY',
            'stock' => '12',
            'product_image' => 'Dash-cam.jpg'
          ],
          [
            'name' => 'Smart Electric Heater, Low Energy Efficient',
            'price' => '55.99',
            'brand' => 'Goveelife',
            'stock' => '233',
            'product_image' => 'Smart-heater.jpg'
          ],
          [
            'name' => 'Upright Vacuum Cleaner',
            'price' => '205.99',
            'brand' => 'Shark',
            'stock' => '44',
            'product_image' => 'Vacuum-cleaner.jpg'
          ],
          [
            'name' => 'Water GoZero Daily Insulated Bottle',
            'price' => '17.99',
            'brand' => 'PHILIPS',
            'stock' => '21',
            'product_image' => 'Water-bottle.png'
          ],
          [
            'name' => 'Electric Table Desk Height Adjustable Desk',
            'price' => '237.99',
            'brand' => 'POKAR',
            'stock' => '72',
            'product_image' => 'Desk.jpg'
          ],
        ];

        // Insert the product records into the product table
        Product::insert($products);
    }
}