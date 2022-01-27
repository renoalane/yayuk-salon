<?php

namespace App\Http\Controllers\AuthControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('layoutsAuth.login.login', [
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

            // cek status akun
            // untuk menghindari session fixsession(teknik hacking)
            $request->session()->regenerate();

            if (auth()->user()->status === 1) {

                // Check is_admin
                if (auth()->user()->is_admin === 0) {

                    // Customer
                    return redirect()->intended('/');
                } else {

                    // Admin
                    return redirect()->intended('dashboard');
                }
            } else {
                Auth::logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return redirect()
                    ->route('login')
                    ->with('loginError', 'Sorry, your account is blocked, please contact admin');
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
