<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Update;
use App\Activity;
use Auth;

class ToolkitController extends Controller
{
    public function index() {

        return view('toolkit.toolkit');
    }
}
