<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\ProjectStatus;
use App\Client;

class ClientsController extends Controller
{
    public function index() {
    	$clients = Client::all();

    	return view('clients.index', compact('clients'));
    }

    public function show(Client $client) {
        $projects = $client->projects->whereNotIn('status', 3);

        return view('clients.show', compact('client', 'projects'));
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
}
