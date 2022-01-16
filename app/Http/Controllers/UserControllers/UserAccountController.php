<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function edit(User $user)
    {
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
}
