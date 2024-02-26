<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        Customer::insert([
            [
                'name' => $faker->name,
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber
            ],
            [
                'name' => $faker->name,
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber
            ],
            [
                'name' => $faker->name,
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber
            ]
        ]);
    }
}
