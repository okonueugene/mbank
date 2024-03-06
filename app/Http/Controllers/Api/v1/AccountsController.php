<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Cheque;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    //get account balance
    public function getBalance(Request $request)
    {
        //check the user account balance
        $user_id = $request->user_id;

        //account model to get the account balance
        $account = Account::where('user_id', $user_id)->first();

        return response()->json([
            'message' => 'Account balance retrieved successfully',
            'balance' => $account->balance,
        ]);
    }

    //deposit money
    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'user_id' => 'required',
        ]);

        //check the user account balance
        $user_id = $request->user_id;

        //account model to get the account balance
        $account = Account::where('user_id', $user_id)->first();

        //create a transaction
        $transaction = Transaction::create([
            'user_id' => $user_id,
            'account_id' => $account->id,
            'type' => 'deposit',
            'amount' => $request->amount,
        ]);

        //update the account balance
        $account->update([
            'balance' => $account->balance + $request->amount,
        ]);

        return response()->json([
            'message' => 'Money deposited successfully',
        ]);
    }

    //stop cheque
    public function stopCheque(Request $request)
    {
        $request->validate([
            'cheque_number' => 'required',
            'user_id' => 'required',
        ]);

        //cheque model to get the cheque
        $cheque = Cheque::where('user_id', $request->user_id)
            ->where('cheque_number', $request->cheque_number)
            ->first();
            //check if the cheque exists or has been stopped
        if (!$cheque || $cheque->status === 'stopped') {
            return response()->json([
                'message' => 'Invalid cheque number',
            ], 404);
        }
        

        //stop the cheque
        $cheque->status = 'stopped';
        $cheque->save();
        
        return response()->json([
            'message' => 'Cheque stopped successfully',
        ]);
    }
}
