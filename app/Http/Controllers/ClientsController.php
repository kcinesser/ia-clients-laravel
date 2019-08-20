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
        $sites = $client->sites->whereNotIn('status', 4);

        return view('clients.show', compact('client', 'jobs', 'sites'));
    }

    public function create() {
        return view('clients.create');
    }

    public function store() {

	  	$attributes = request()->validate([
            'name' => 'required', 
        ]);

        $attributes = request()->all();

        $client = Client::create($attributes);

        return redirect($client->path());
    }

    public function edit(Client $client) {
    	return view ('clients.edit', compact('client'));
    }

    public function update(Client $client) {
        $attributes = request()->validate([
            'name' => 'sometimes', 
        ]);
        $attributes = request()->all();

        $client->update($attributes);

        return redirect($client->path());
    }

        public function notes(Client $client) {
        $attributes = request()->all();

        $client->update($attributes);

        return redirect($client->path());
    }
}
