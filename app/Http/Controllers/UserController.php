<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    function index(Request $requset)
    {
        $user=User::where('email',$requset->email)->first();
        if(!$user || !Hash::check($requset->password,$user->password))
        {
            return response([
                'message'=>['these credentials do not match our records.']
            ],404);
        }

        $token=$user->createToken('my-app-token')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token,
        ];

        return response($requset,201);
    }
}
