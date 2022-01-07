<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserReadController extends Controller
{
    /**
     * Returns a list (array) of userids and names for form options.
     *
     * @return JSON -> array of users
     */
   public static function getUsers(Request $request){
        $users = User::all();
        $usersArray = array();
        foreach ($users as $user) {
            $userObj = new \stdClass();
            $userObj->text = $user->name;
            $userObj->value = $user->id;
            array_push($usersArray, $userObj);
        }
        return response()->json($usersArray);
   }
}
