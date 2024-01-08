<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(!Auth::attempt($credentials, true)){
            return response()->json([
                'error' => 'The provided credential are not correct'
            ], 422);
    }
    $user =Auth::user();
    $token = $user ->createToken('instructory')->plainTextToken;

    return response()->json([
        'user' =>$user,
        'token'=>$token,
    ]);
}
}
