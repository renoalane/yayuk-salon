<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function edit(User $user)
    {
        //cek username
        if ($user->username != auth()->user()->username) {
            return abort('403');
        }
        return view('frontEndCustomer.account.edit', [
            'title' => 'Account',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        if ($request->phone != $user->phone) {
            $rules['phone'] = 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:12|unique:users';
        }

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validateData = $request->validate($rules);

        User::where('username', $user->username)
            ->update($validateData);

        return redirect()
            ->route('user.account.edit', $user->username)
            ->with('success', 'User has been Updated');
    }


    // User Change Password
    public function showChangePassword(User $user)
    {
        // Cek username 
        if ($user->username != auth()->user()->username) {
            return abort('403');
        }

        return view('frontEndCustomer.account.changePassword', [
            'title' => 'Account',
            'user' => $user
        ]);
    }
    public function changePassword(Request $request, User $user)
    {
        $validatePassword = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:5|max:255',
            'password_confirmation' => 'required|same:password|min:5'
        ]);

        // Validate if current password not same with password user
        if (!Hash::check($validatePassword['current_password'], $user->password)) {
            return redirect()
                ->back()
                ->with('failed', 'Your current password does not matches with the password');
        }

        // Current password and new password same
        if (strcmp($validatePassword['current_password'], $validatePassword['password']) == 0) {
            return redirect()
                ->back()
                ->with("failed", "New Password cannot be same as your current password.");
        }

        // Hash New Password
        $validatePassword['password'] = Hash::make($validatePassword['password']);

        $user->update($validatePassword);
        return redirect()
            ->route('user.account.edit', $user->username)
            ->with('success', 'Password has been changed');
    }
}
