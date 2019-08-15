<?php

namespace App\Http\Controllers;

use App\Hosting;
use Illuminate\Http\Request;
use App\User;
use App\Registrar;
use App\Service;

class SettingsController extends Controller
{
    public function index() {
    	$users = User::all();
    	$registrars = Registrar::all();
    	$services = Service::all();
    	$hosting = Hosting::all();

    	return view('settings.index', compact('users', 'registrars', 'services', 'hosting'));
    }
}
