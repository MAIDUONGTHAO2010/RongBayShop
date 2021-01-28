<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use JWTAuth;
class AccountController extends Controller
{
    //
    public function register(Request $request)
    {
       if(isset($request->email)&&isset($request->password)){
            $user = new User($request->all());
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json($user);
       }
    }
     public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'message' => 'errors',
                'errors' => [
                   [
                      'field' => 'email or password ',
                      'code' => '40101'
                   ]
                ]
            ], 401);
        } 
        return response()->json([
            'status' => true,
            'message' => 'login success',
            'token' => $token,
        ]);

    }
    public function getUser(Request $request)
    {
        $token = $request->header('Authorization');
        if(isset($token)){
           return JWTAuth::setToken( $token)->toUser();
        }
    }
    
}
