<?php

namespace App\Http\Controllers;

use App\Hosting;
use Illuminate\Http\Request;
use App\User;
use App\Registrar;
use App\Service;
use App\Enums\UserTypes;

class SettingsController extends Controller
{
    public function index() {
    	$users = User::all();
    	$registrars = Registrar::all();
    	$services = Service::all();
    	$hosting = Hosting::all();
    	$roles = UserTypes::toSelectArray();

    	return view('settings.index', compact('users', 'registrars', 'services', 'hosting', 'roles'));
    }
}
