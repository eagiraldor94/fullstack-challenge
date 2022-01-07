<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserStoreController extends Controller
{
    /**
     * Create user and return token.
     * @requires string name
     * @requires string email
     * @requires string password
     * @requires string device_name
     * @return JSON -> token
     */
    public function createUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            return response()->json([
                'token' => $user->createToken($request->device_name)->plainTextToken
            ]);
        }else{
            throw ValidationException::withMessages([
                'data' => 'The user can not be creaated'
            ]);
        }
    }
}
