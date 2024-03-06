<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'account_number' => '1234567890',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'pin' => Hash::make('1234'),
            ],
            [
                'account_number' => '0987654321',
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'pin' => Hash::make('4321'),
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
