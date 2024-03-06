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
            [
                'account_number' => '1357924680',
                'first_name' => 'John',
                'last_name' => 'Smith',
                'pin' => Hash::make('5678'),
            ],
            [
                'account_number' => '2468013579',
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'pin' => Hash::make('8765'),
            ],
            [
                'account_number' => '9876543210',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'pin' => Hash::make('9876'),
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
