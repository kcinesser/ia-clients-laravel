<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Update;
use App\Activity;
use Auth;

class DashboardController extends Controller
{
    public function index() {
    	$user = Auth::user();
    	$clients = $user->dashboardClients();
    	$jobs = $user->dashboardJobs();
    	$updates = Update::all();
    	$activities = Activity::latest()->take(10)->get();

    	return view('dashboard.dashboard', compact('user', 'clients', 'jobs', 'updates', 'activities'));
    }
}
