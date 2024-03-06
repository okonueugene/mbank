<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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

    //change the pin
    public function changePin(Request $request)
    {
        $request->validate([
            'old_pin' => 'required',
            'new_pin' => 'required',
        ]);

        $user = $request->user();

        if (!password_verify($request->old_pin, $user->pin)) {
            return response()->json([
                'message' => 'Invalid old pin',
            ], 401);
        }

        $user->pin = Hash::make($request->new_pin);
        $user->save();

        return response()->json([
            'message' => 'Password changed successfully',
        ]);
    }
}
