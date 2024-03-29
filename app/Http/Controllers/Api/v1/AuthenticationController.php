<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'account_number' => 'required',
            'pin' => 'required',
        ]);

        $user = User::where('account_number', $request->account_number)->first();

        if (!$user || !Hash::check($request->pin, $user->pin)) {
            return response()->json([
                'message' => 'Invalid account number or pin',
            ], 200);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        //fetch the user using user_id
        $user = User::find($request->user_id);

        //revoke the user token
        $user->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);

    }
}
