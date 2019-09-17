<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Enums\ClientStatus;
use App\Enums\SiteStatus;
use App\Enums\ProjectStatus;
use App\Enums\RemoteDomainsProviders;

class ClientController extends Controller
{
    public function index() {
    	$clients = Client::all()->whereNotIn('status', ClientStatus::Archived);

    	return view('clients.index', compact('clients'));
    }

    public function show(Client $client) {
        $projects = $client->projects->whereNotIn('status', ProjectStatus::Archived);
        $sites = $client->sites->whereNotIn('status', SiteStatus::Archived);

        return view('clients.show', compact('client', 'projects', 'sites'));
    }


    public function create() {
        $statuses = ClientStatus::toSelectArray();

        return view('clients.create', compact('statuses'));
    }

    public function store() {
	  	$attributes = $this->validate_data();

        $client = Client::create($attributes);

        return redirect($client->path());
    }


    public function edit(Client $client) {
        $statuses = ClientStatus::toSelectArray();

    	return view ('clients.edit', compact('client', 'statuses'));
    }

    public function update(Client $client) {
        $attributes = $this->validate_data();
        $client->update($attributes);

        return redirect($client->path());
    }

    public function destroy (Client $client) {
        $client->delete();

        return redirect('/');
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
            'name' => 'required|sometimes',
            'contact_name' => 'nullable',
            'contact_email' => 'nullable',
            'contact_phone' => 'nullable',
            'account_manager_id' => 'required|numeric|sometimes',
            'status' => 'numeric|sometimes'
        ]);
    }

    public function archives() {
        $archived_clients = Client::all()->where('status', ClientStatus::Archived);

        return view('clients.archive', compact('archived_clients'));
    }

    public function archive(Client $client) {
        $client->update([
            'status' => ClientStatus::Archived
        ]);

        foreach($client->sites as $site) {
            $site->update([
                'status' => SiteStatus::Archived
            ]);
        }

        foreach($client->projects as $project) {
            $project->update([
                'status' => ProjectStatus::Archived
            ]);
        }

        return redirect('/');
    }

    public function clientSites (Client $client) {

        return response()->json($client->sites);
    }
}
