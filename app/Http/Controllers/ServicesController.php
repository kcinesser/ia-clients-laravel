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

    public function edit(Service $service) {
    	return view('services.edit', compact('service'));
    }

    public function update(Service $service) {
        $attributes = request()->all();

        $service->update($attributes);

        return redirect('/settings');
    }
}
