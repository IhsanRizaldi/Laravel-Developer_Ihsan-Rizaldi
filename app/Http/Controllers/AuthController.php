<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView(){
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('auth.login');
        }
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors(['failed' => 'Email atau password salah.']);
        }
        return redirect()->route('home')->with('success', 'Login Berhasil');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('loginView')->with('success', 'Logout Berhasil');
    }
}
