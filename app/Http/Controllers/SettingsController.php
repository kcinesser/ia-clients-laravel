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
    	$users = User::all()->sortBy('name');
    	$registrars = Registrar::all()->sortBy('name');
    	$services = Service::all()->sortBy('name');
    	$hosting = Hosting::all()->sortBy('name');
    	$roles = UserTypes::toSelectArray();

    	return view('settings.index', compact('users', 'registrars', 'services', 'hosting', 'roles'));
    }
}
