<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Update;
use Auth;

class DashboardController extends Controller
{
    public function index() {
    	$user = Auth::user();
    	$clients = $user->dashboardClients();
    	$projects = $user->dashboardProjects();
    	$updates = Update::all();

    	return view('dashboard.dashboard', compact('user', 'clients', 'projects', 'updates'));
    }
}
