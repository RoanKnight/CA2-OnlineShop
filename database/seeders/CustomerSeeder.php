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
            'first_name' => 'Peter',
            'last_name' => 'Hawthorn',
            'phone_number' => '0874937619',
            'email' => 'peter345@gmail.com',
          ],
          [
            'first_name' => 'Sofia',
            'last_name' => 'Rodriguez',
            'phone_number' => '0856345568',
            'email' => 'sofia34@gmail.com',
          ],
          [
            'first_name' => 'Ben',
            'last_name' => 'Fitzpatrick',
            'phone_number' => '0869918835',
            'email' => 'benfitz@gmail.com',
          ],
          [
            'first_name' => 'Olivia',
            'last_name' => 'Smith',
            'phone_number' => '0836739988',
            'email' => 'olivia467@gmail.com',
          ],
          [
            'first_name' => 'Jason',
            'last_name' => 'Doyle',
            'phone_number' => '0876634415',
            'email' => 'jason24@gmail.com',
          ],
          [
            'first_name' => 'Alisha',
            'last_name' => 'Cassidy',
            'phone_number' => '0867735678',
            'email' => 'alisha61@gmail.com',
          ],
          [
            'first_name' => 'Leah',
            'last_name' => 'Matthews',
            'phone_number' => '0875367892',
            'email' => 'leah73@gmail.com',
          ],
          [
            'first_name' => 'Jesse',
            'last_name' => 'Gray',
            'phone_number' => '0856619983',
            'email' => 'jesse145@gmail.com',
          ],
          [
            'first_name' => 'Josh',
            'last_name' => 'Brown',
            'phone_number' => '0836772998',
            'email' => 'josh652@gmail.com',
          ],
        ];

        Customer::insert($customers);
    }
}