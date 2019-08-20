<?php

namespace App\Http\Controllers;
use App\Service;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function store() {
        $request = request()->all();
        $request['price'] = preg_replace('/[^0-9.]/', '', request('price'));

        request()->replace($request);

        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        $registrar = Service::create($attributes);

        return redirect('/settings');
    }

    public function update(Service $service) {
        $request = request()->all();
        $request['price'] = preg_replace('/[^0-9.]/', '', request('price'));

        request()->replace($request);

        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);
        
        $service->update($attributes);

        return redirect('/settings');
    }
}
