<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Service;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function store(ServiceRequest $request) {
        $attributes = $request->validated();
        Service::create($attributes);

        return redirect('/settings');
    }

    public function update(ServiceRequest $request, Service $service) {
        $attributes = $request->validated();
        $service->update($attributes);
        
        return redirect('/settings');
    }

    public function destroy(Service $service) {
        $service->delete();

        return redirect('/settings');
    }
}
