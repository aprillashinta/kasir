<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function show_login(){
        return view('auth.login');
    }
    public function store_login(Request $request){
        if(!Auth::attempt($request->only('email', 'password'))){
            return back()->withErrors(['message' => 'Email atau password salah!']);
        }
        return redirect()->route('user.index');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login.show');
    }
}
