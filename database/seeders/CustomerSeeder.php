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
            'phone_number' => '0894673664',
            'email' => 'john@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0874937619',
            'email' => 'john2@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0856345568',
            'email' => 'john3@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0869918835',
            'email' => 'john4@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0836739988',
            'email' => 'john5@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0876634415',
            'email' => 'john6@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0867735678',
            'email' => 'john7@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0875367892',
            'email' => 'john8@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0856619983',
            'email' => 'john9@gmail.com',
          ],
          [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0836772998',
            'email' => 'john10@gmail.com',
          ],
        ];

        Customer::insert($customers);
    }
}