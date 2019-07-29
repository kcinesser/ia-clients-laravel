<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Client;
use App\Project;
use App\Registrar;
use App\DomainAccount;
use Illuminate\Http\Request;

class DomainsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client, Project $project)
    {
        $registrars = Registrar::all();
        $owners = \App\Enums\Owners::toSelectArray();

        return view('domains.create', compact('project'), compact('registrars', 'owners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Client $client, Project $project, DomainAccount $account)
    {
        $attributes = request()->all();

        $account = DomainAccount::create([
            'url' => $attributes['url'],
            'description' => $attributes['url_description'],
            'owner' => $attributes['domain_owner']
        ]);

        $domain = array(
            'name' => $attributes['name'],
            'exp_date' => $attributes['exp_date'],
            'project_id' => $project->id,
            'registrar_id' => $attributes['registrar_id'],
            'domain_account_id' => $account->id
        );

        $project->addDomain($domain);

        return redirect($project->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, Project $project, Domain $domain)
    {
        return view('domains.show', compact('domain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domain $domain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        //
    }
}
