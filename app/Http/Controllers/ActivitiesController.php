<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{

    public function index()
    {
        $activities = Activity::all();

        return view('activities.index', compact('activities'));
    }

}
