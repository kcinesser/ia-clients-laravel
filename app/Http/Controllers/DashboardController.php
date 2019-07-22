<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Auth;

class DashboardController extends Controller
{
    public function index() {
    	$user = Auth::user();
    	$clients = Client::where('account_manager_id', $user->id)->get();
    	$projects = $user->projects;

    	return view('dashboard.dashboard', compact('user', 'clients', 'projects'));
    }
}
