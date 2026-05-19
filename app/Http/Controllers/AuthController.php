<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;

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

        if (Auth::user()->role === 'admin') {
            return redirect()->route('user.index');
        }
        else if (Auth::user()->role === 'tutor') {
            return redirect()->route('tutor.driving-session.index');
        }
        else if (Auth::user()->role === 'user') {
            return redirect()->route('dashboard');
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

    public function registerForm()
    {
        return view('pages.auth.register');
    }

     public function register(StoreUserRequest $request)
    {
        // Validasi input
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);
        // Buat user baru
        User::create($data);

        

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

}
