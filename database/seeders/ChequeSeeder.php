<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChequeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $cheques = [
            [
                'user_id' => 1,
                'account_id' => 1,
                'amount' => 1000,
                'cheque_number' => '1234567890',
                'status' => 'pending',
            ],
            [
                'user_id' => 2,
                'account_id' => 2,
                'amount' => 2000,
                'cheque_number' => '0987654321',
                'status' => 'pending',
            ],
            [
                'user_id' => 3,
                'account_id' => 3,
                'amount' => 3000,
                'cheque_number' => '1357924680',
                'status' => 'pending',
            ],
            [
                'user_id' => 4,
                'account_id' => 4,
                'amount' => 4000,
                'cheque_number' => '2468013579',
                'status' => 'pending',
            ],
            [
                'user_id' => 5,
                'account_id' => 5,
                'amount' => 5000,
                'cheque_number' => '9876543210',
                'status' => 'pending',
            ],
        ];

        foreach ($cheques as $cheque) {
            \App\Models\Cheque::create($cheque);
        }
    }
}
