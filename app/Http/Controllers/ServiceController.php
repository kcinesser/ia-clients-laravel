<?php

namespace App\Http\Controllers;
use App\Service;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function store() {
        Service::create($this->validate_data());

        return redirect('/settings');
    }

    public function update(Service $service) {
        $service->update($this->validate_data());
        return redirect('/settings');
    }


    private function validate_data(){
        return request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'nullable|numeric'
        ]);
    }

    public function destroy(Service $service) {
        $service->delete();

        return redirect('/settings');
    }
}
