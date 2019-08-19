<?php

namespace App\Http\Controllers;

use App\Enums\JobStatus;
use Illuminate\Http\Request;
use App\Client;

class ClientsController extends Controller
{
    public function index() {
    	$clients = Client::all()->whereNotIn('status', 3);

    	return view('clients.index', compact('clients'));
    }

    public function show(Client $client) {
        $jobs = $client->jobs->whereNotIn('status', 3);
        $sites = $client->sites;

        return view('clients.show', compact('client', 'jobs', 'sites'));
    }

    public function create() {
        $statuses = JobStatus::toSelectArray();

        return view('clients.create', compact('statuses'));
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
        $statuses = JobStatus::toSelectArray();

    	return view ('clients.edit', compact('client', 'statuses'));
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

    public function archives() {
        $archived_clients = Client::all()->where('status', 3);

        return view('clients.archive', compact('archived_clients'));
    }

    public function archive(Client $client) {
        $client->update([
            'status' => 3
        ]);

        return redirect('/');
    }
}
