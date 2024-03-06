<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'pin' => 'required',
        ]);

        $accountNumber = User::all()->count() + 1;

        $user = User::create([
            'account_number' =>$accountNumber,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'pin' => bcrypt($request->pin),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ], 201);
    }
}
