<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        
        $credentials = $request->all(['email', 'password']);

        $token = auth('api')->attempt($credentials);

        if($token){
            return response()->json(['token' => $token], 200);
        }else {
            return response()->json(['error' => 'Invalid login'], 403);
        }

    }

    public function logout(){
        auth('api')->logout();
        return response()->json(['msg' => 'Logout success']);
    }


}
