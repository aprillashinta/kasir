<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Sapu',
                'price' => 17000,
                'stock' => 15,
            ],
            [
                'name' => 'Sabun',
                'price' => 3000,
                'stock' => 30,
            ],
            [
                'name' => 'Gelas',
                'price' => '2500',
                'stock' => 25,
            ],
            [
                'name' => 'Botol Minum',
                'price' => '20000',
                'stock' => 10
            ]
        ]);
    }
}
