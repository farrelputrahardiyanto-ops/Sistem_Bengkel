<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    
        public function loginForm()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (auth()->user()->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/');
        }

        return back()->with('error', 'Email / Password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
