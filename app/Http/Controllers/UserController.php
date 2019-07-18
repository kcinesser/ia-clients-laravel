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

        $user = User::create($attributes);

        return redirect('/settings');
    }
}
