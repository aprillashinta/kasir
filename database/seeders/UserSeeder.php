<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'administrator',
                'password' => Hash::make('admin'),
            ],
            [
                'name' => 'Petugas',
                'email' => 'petugas@gmail.com',
                'role' => 'petugas',
                'password' => Hash::make('petugas'),
            ]
        ]);
    }
}
