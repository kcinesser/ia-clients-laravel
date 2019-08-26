<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Enums\UserTypes;

class UserController extends Controller
{
	public function create() {
        $roles = UserTypes::toSelectArray();

    	return view('users.create', compact('roles'));
    }

    public function store() {

    	$attributes = request()->validate([
    	    'name' => 'required',
            'email' => 'required|email',
            'role' => 'required|numeric',
            'password' => 'required|confirmed'
        ]);

    	//encrypt password
    	$attributes['password'] =  bcrypt($attributes['password']);

        User::create($attributes);

        return redirect('/settings');
    }

    public function edit(User $user) {
        $roles = UserTypes::toSelectArray();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(User $user) {

        $user->update(
            request()->validate([
                'name' => 'required',
                'role' => 'required|numeric',
                'email' => 'required|email'
            ])
        );

        return redirect('/settings');
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect('/settings');
    }
}
