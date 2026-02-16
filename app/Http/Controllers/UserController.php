<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // register screen
    function register(){
        return view("register");
    }
    // create user for registration
    function create(Request $req){
       $req->validate([
          "name" => "required|alpha|max:255",
          "email"=> "required|unique:users|max:255",
          "password"=> "required|min:6|confirmed"
        ]);

        User::create([
            "name" => $req->name,
            "email"=> $req->email,
            "password"=> Hash::make($req->password)
        ]);

        return redirect()->route('login')->with("status","successfully Regsitered");
    }
    // login screen
    function login(){
        return view("login");
    }

    function authenticate(Request $req) {
          $req->validate([
          'email' => 'required|email|exists:users,email|max:255',
          "password"=> "required|min:6"
        ]);

        if(Auth::attempt(["email"=> $req->email,"password"=>$req->password])){
          return redirect()->route("image")->with("status","successfully Regsitered");
        }
    }
}
