<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{

    public function __invoke(LoginRequest $request)
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        if($user->email_verified_at == null) {
            return response()->json([
                'message' => 'Email not verified'
            ], 401);
        }

        $token = $user->createToken('token')->plainTextToken;
       

        return response()->json([
            'message' => 'Login successful',
            'token' => $token
        ], 200);
    }

}
