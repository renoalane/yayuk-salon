<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $users)
    {
        $q = $request->input('q');

        $users = $users->when($q, function ($query) use ($q) {
            return $query->where('name', 'like', '%' . $q . '%');
        })->paginate(5);

        // Menumpuk searching dan pagiation
        $request = $request->all();

        return view('dashboard.user.list', [
            'users' => $users,
            'title' => 'user',
            'active' => 'users',
            'request' => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.form', [
            'active' => 'users',
            'title' => 'user',
            'button' => 'Update',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'is_admin' => 'required',
            'status' => 'required'
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|min:3|max:10|unique:users';
        }

        if ($request->phone != $user->phone) {
            $rules['phone'] = 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|unique:users';
        }

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validateData = $request->validate($rules);

        User::where('id', $user->id)
            ->update($validateData);

        return redirect()
            ->route('dashboard.user')
            ->with('success', 'User has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth::id() === $user->id) {
            return redirect()->route("dashboard.user")->with('failed', 'User is already used');
        } else {
            $user->delete();
        }
        return redirect()->route('dashboard.user')->with('success', 'Service has been deleted');
    }
}
