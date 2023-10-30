<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0867835678',
            'email' => 'john@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0867835678',
            'email' => 'john2@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0867835678',
            'email' => 'john3@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0867835678',
            'email' => 'john4@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0867835678',
            'email' => 'john5@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0867835678',
            'email' => 'john6@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0867835678',
            'email' => 'john7@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0867835678',
            'email' => 'john8@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0867835678',
            'email' => 'john9@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0867835678',
            'email' => 'john10@gmail.com',
          ],
        ];

        Customer::insert($customers);
    }
}