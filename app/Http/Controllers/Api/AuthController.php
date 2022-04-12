<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\AuthController;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $requset)
    {
        $user=User::where('email',$requset->email)->first();
        // $user=DB::select('select * from users');;
        // dd($requset->password);
        if(!$user || !Hash::check($requset->password,$user->password))
        {
            return response([
                'message'=>['these credentials do not match our records.']
            ],404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token,
        ];

        return response($requset,201);

        // $user=User::get();
        // $msg=["ok"];
        // return response($user,200,$msg);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
