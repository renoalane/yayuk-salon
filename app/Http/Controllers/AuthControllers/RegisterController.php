<?php

namespace App\Http\Controllers\AuthControllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:10|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|confirmed|min:5|max:255',
        ]);

        // Hash Password

        // $validateData['password'] = bcrypt($validateData);
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        // $request->session()->flash('succes', 'Registration Succesfull ! Please Login');

        return redirect()->route('login')->with('success', 'Registration Succesfull ! Please Login');
    }
}
