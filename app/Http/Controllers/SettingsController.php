<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Registrar;

class SettingsController extends Controller
{
    public function index() {
    	$users = User::all();
    	$registrars = Registrar::all();

    	return view('settings.index', compact('users', 'registrars'));
    }
}
