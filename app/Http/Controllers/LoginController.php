<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('/login');
    }



    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/undangan');
        }

        return back()->with('loginError', 'Login Failed !! Try Again');
    }
}
