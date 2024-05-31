<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\support\Facades\Auth;
use App\Models\role;
use App\Models\user;

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
            $user = Auth::user();
            $request->session()->regenerate();

            if ($user->idrole == 1) { // Role ID 1 for Admin
                return redirect()->intended('/admin');
            } elseif ($user->idrole == 2) { // Role ID 2 for User
                return redirect()->intended('/undangan');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->with('loginError', 'Login Failed !! Try Again');
    }
}
