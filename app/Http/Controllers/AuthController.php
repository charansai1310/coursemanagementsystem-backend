<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){

        $validateData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'mavid'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'dob'=> 'string|max:255',
            'role'  => 'required|string|max:255',
            'phone' => 'string|max:15',
            'address'  => 'string',
        ]);

        $user = User::create([
            'firstname' => $validateData['firstname'],
            'lastname' => $validateData['lastname'],
            'mavid' => $validateData['mavid'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'dob' => $validateData['dob'],
            'role' => $validateData['role'],
            'phone' => $validateData['phone'],
            'address' => $validateData['address'],
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        event(new Registered($user));

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'],
                401
            );
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
        ]);
    }
}
