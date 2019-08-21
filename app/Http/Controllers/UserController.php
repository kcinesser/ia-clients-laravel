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
    	$attributes = request()->all();

        $user = User::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
            'role' => $attributes['role']
        ]);
        return redirect('/settings');
    }

    public function edit(User $user) {
        $roles = UserTypes::toSelectArray();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(User $user) {
        $attributes = request()->all();

        $user->update($attributes);

        return redirect('/settings');
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect('/settings');
    }
}
