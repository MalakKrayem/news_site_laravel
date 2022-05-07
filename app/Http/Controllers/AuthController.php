<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function logIn(){
        return view('auth.login');

    }
    public function authenticate(Request $request){
        $login_data=[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($login_data)){
            return redirect()->route('admin');

        }
        return redirect()->back()->with('error','Invalid email or password');
    }
    public function logOut(){
        if (Auth::check()){
            Auth::logout();
        }
        return redirect()->route('home');
    }
    public function register(){
        return view('auth.register');

    }
    public function doRegister(Request $request){
        $request->validate([
            'name'=>'required|unique:users|max:15|min:5|string',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed'
        ]);
        User::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'email_verified_at'=>now(),]);
        return redirect()->route('login')->with('success','User added sucessfuly!');
    }
}
