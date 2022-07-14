<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api', ['except'=>['login']]);
    }

    public function login(){
        $credentials = request(['email', 'password']);
        $token = auth()->guard('api')->attempt($credentials);
        if(!$token){
            return response()->json(['error'=>'Credenciales no validas'],401);
        }
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token){
        $auxuser = auth('api')->user();
        return response()->json([
            'token' => $token,
            'access_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => $auxuser,
        ]);
    }

    public function logout(){
        auth()->logout('api');
        return response()->json(['msj'=>'Sesion finalizada con exito']);
    }

    public function refresh(){
        return $this->respondWithToken(auth('api')->refresh());
    }

    public function me(){
        return response()->json(auth()->user());
    }
}
