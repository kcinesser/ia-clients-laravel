<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;
use Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index() {		
		$dashboard = new Dashboard();
		$dashboard_items = $dashboard->getDashboard();
		
		return view('dashboard.dashboard', compact('dashboard_items'));
	}
}
