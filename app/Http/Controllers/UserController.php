<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Enums\UserTypes;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
	public function create() {
        $roles = UserTypes::toSelectArray();

    	return view('users.create', compact('roles'));
    }

    public function store(UserStoreRequest $request) {
    	$attributes = $request->validated();
    	//encrypt password
    	$attributes['password'] =  bcrypt($attributes['password']);

        User::create($attributes);

        return redirect('/settings');
    }

    public function edit(User $user) {
        $roles = UserTypes::toSelectArray();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, User $user) {
    	$attributes = $request->validated();
        $user->update($attributes);

        return redirect('/settings');
    }

    public function destroy(User $user) {
	    //dd(request("reassign_am"));
        foreach($user->clients as $client) {
            $client->update(['account_manager_id' => request("reassign_am")]);
        }

        $user->delete();

        return redirect('/settings');
    }
}
