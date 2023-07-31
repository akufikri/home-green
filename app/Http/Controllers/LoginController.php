<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // public function login(){
    //     return view('login-admin');
    // }
      public function login_actions(Request $request)
    {
        if (Auth::attempt($request->only('email','password'))) {
        return redirect('/');
        }
       return back()->with('success', 'Success login');
    }
      public function register(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
            
        ]);
        return back();
    }
    public function sign_out(){

        Auth::logout();

        return redirect('/');
    }
}