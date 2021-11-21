<?php

namespace App\Http\Controllers\AuthControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login', [
            'title' => 'Login'
        ]);
    }

    public function autenticate(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credential)) {

            // untuk menghindari session fixsession(teknik hacking)
            $request->session()->regenerate();

            // Check is_admin
            if (auth()->user()->is_admin === 0) {

                // Customer
                return redirect()->intended('home');
            } else {

                // Admin
                return redirect()->intended('dashboard');
            }
        }

        return back()->with('loginError', 'Failed Login');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('login');
    }
}
