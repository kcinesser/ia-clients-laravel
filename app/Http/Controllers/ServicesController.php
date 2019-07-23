<?php

namespace App\Http\Controllers;
use App\Service;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function create() {
    	return view('services.create');
    }

    public function store() {
        $attributes = request()->all();

        $registrar = Service::create($attributes);

        return redirect('/settings');
    }
}
