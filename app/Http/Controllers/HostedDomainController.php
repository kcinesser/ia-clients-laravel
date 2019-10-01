<?php

namespace App\Http\Controllers;

use App\HostedDomain;
use App\Client;
use App\Site;
use App\DomainAccount;
use App\Http\Requests\HostedDomainRequest;
use App\Http\Requests\HostedDomainUpdateRequest;
use Illuminate\Http\Request;

class HostedDomainController extends Controller
{
    public function index() {
        $domains = HostedDomain::with('client')->orderBy('name', 'asc')->get();

        return view('domains.index', compact('domains'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HostedDomainRequest $request, Client $client)
    {
        $attributes = $request->validated();
           
        $domain = $client->addDomain($attributes);

        if($domain->site) {
            return redirect($domain->site->path());
        } else {
            return redirect($client->path());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(HostedDomainUpdateRequest $request, Client $client, HostedDomain $domain)
    {
        $attributes = $request->validated();
        $domain->update($attributes);
        
        return redirect($client->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, HostedDomain $domain)
    {
        $domain->delete();

        return back();
    }
}
