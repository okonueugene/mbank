<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 'user_id',
        // 'balance'

        $accounts = [
            [
                'user_id' => 1,
                'balance' => 1000,
            ],
            [
                'user_id' => 2,
                'balance' => 2000,
            ],
            [
                'user_id' => 3,
                'balance' => 3000,
            ],
            [
                'user_id' => 4,
                'balance' => 4000,
            ],
            [
                'user_id' => 5,
                'balance' => 5000,
            ],
        ];

        foreach ($accounts as $account) {
            \App\Models\Account::create($account);
        }

    }
}
