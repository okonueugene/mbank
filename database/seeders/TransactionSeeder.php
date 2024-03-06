<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = [
            [
                'user_id' => 1,
                'account_id' => 1,
                'type' => 'deposit',
                'amount' => 1000,
            ],
            [
                'user_id' => 2,
                'account_id' => 2,
                'type' => 'deposit',
                'amount' => 2000,
            ],
            [
                'user_id' => 3,
                'account_id' => 3,
                'type' => 'deposit',
                'amount' => 3000,
            ],
            [
                'user_id' => 4,
                'account_id' => 4,
                'type' => 'deposit',
                'amount' => 4000,
            ],
            [
                'user_id' => 5,
                'account_id' => 5,
                'type' => 'deposit',
                'amount' => 5000,
            ],
        ];

        foreach ($transactions as $transaction) {
            \App\Models\Transaction::create($transaction);
        }
    
    }
}
