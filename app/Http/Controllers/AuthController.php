<?php

// app/Http/Controllers/Auth/PhoneAuthController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
        ]);

        $user = User::firstOrCreate(['phone_number' => $request->phone_number]);

        Auth::login($user);

        return response()->json(['user' => $user, 'token' => $user->createToken('auth-token')->plainTextToken]);
    }
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|unique:users,phone_number',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);

        Auth::login($user);

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('auth-token')->plainTextToken
        ]);
    }
}
