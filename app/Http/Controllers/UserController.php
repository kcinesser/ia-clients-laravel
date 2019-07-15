<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function create() {
    	return view('users.create');
    }

    public function store() {
    	$attributes = request()->all();

        $user = User::create($attributes);

        $user->setRoles($attributes['role']);
        $user->save();

        return redirect('/settings');
    }
}
