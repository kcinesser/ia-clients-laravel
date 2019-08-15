<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientsController extends Controller
{
    public function index() {
    	$clients = Client::all();

    	return view('clients.index', compact('clients'));
    }

    public function show(Client $client) {
        $jobs = $client->jobs->whereNotIn('status', 3);
        $sites = $client->sites;

        return view('clients.show', compact('client', 'jobs', 'sites'));
    }

    public function create() {
        return view('clients.create');
    }

    public function store() {

	  	$attributes = $this->validate_data();

        $client = Client::create($attributes);

        return redirect($client->path());
    }

    public function edit(Client $client) {
    	return view ('clients.edit', compact('client'));
    }

    public function update(Client $client) {

        $attributes = $this->validate_data();
        $client->update($attributes);

        return redirect($client->path());
    }

    public function notes(Client $client) {

        $client->update(
            request()->validate([
                'notes' => 'nullable'
            ])
        );

        return redirect($client->path());
    }

    private function validate_data(){
        return request()->validate([
            'name' => 'required',
            'contact_name' => 'nullable',
            'contact_email' => 'nullable',
            'contact_phone' => 'nullable',
            'account_manager_id' => 'required|numeric'
        ]);
    }
}
