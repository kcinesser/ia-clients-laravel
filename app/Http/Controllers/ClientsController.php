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
        $sites = $client->sites->whereNotIn('status', 4);

        return view('clients.show', compact('client', 'jobs', 'sites'));
    }


    public function create() {
        $statuses = JobStatus::toSelectArray();

        return view('clients.create', compact('statuses'));
    }

    public function store() {

	  	$attributes = $this->validate_data();

        $client = Client::create($attributes);

        return redirect($client->path());
    }


    public function edit(Client $client) {
        $statuses = JobStatus::toSelectArray();

    	return view ('clients.edit', compact('client', 'statuses'));
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


    private function validate_data() {
        return request()->validate([
            'name' => 'required',
            'contact_name' => 'nullable',
            'contact_email' => 'nullable',
            'contact_phone' => 'nullable',
            'account_manager_id' => 'required|numeric'
        ]);
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
