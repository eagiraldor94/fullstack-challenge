<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    /**
     * Validate user and return token.
     * @requires string email
     * @requires string password
     * @requires string device_name
     * @return JSON -> token
     */
    public function __invoke(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'Invalid credentials'
            ]);
        }else{
            return response()->json([
                'token' => $user->createToken($request->device_name)->plainTextToken
            ]);
        }
    }
}
