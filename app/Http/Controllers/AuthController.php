<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
 public function login(Request $request){
   $http = new \GuzzleHttp\Client;

    try{
        $response = $http->post('http://todo-app.test/oauth/token',[
            "form_params" => [
                "grant_type" => "password",
                "client_id"=> 2,
                "client_secret" => "ZgBrUJEM1WTz74xx88haneaIaVmPJNQzXXsnX5Bi",
                "username" => $request->username,
                "password" => $request->password,

            ]
        ]);
        return $response->getBody();
    } catch (\GuzzleHttp\Exception\BadResponseException $e){
        if($e->getCode() === 400){
            return response()->json("Invalid Request, Please Enter Username Or Password", $e->getCode());
        }elseif ($e->getCode() === 401){
            return response()->json("Your credentials are incorrect, Please Try again.", $e->getCode());
        }else{
            return response()->json("Something went wrong on the server", $e->getCode());
        }
    }
 }

 public function register(Request $request){
      $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|max:6',
     ]);
     
     return User::create( [
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
     ]);
 }
 public function logout(){
    auth()->user()->tokens()->each(function($token, $key){
       $token->delete();
    });
    return response()->json("Logged out Successfully");
 }
}


