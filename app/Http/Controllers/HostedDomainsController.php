<?php

namespace App\Http\Controllers;

use App\HostedDomain;
use App\Client;
use App\Site;
use App\DomainAccount;
use Illuminate\Http\Request;

class HostedDomainsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Client $client)
    {
        $attributes = $this->validate_data();
           
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
    public function update(Client $client, HostedDomain $domain)
    {
        $domain->update($this->validate_data());

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

    /**
     * Validates the form data
     */
    private function validate_data(){
        return request()->validate([
            'name' => 'required',
            'exp_date' => 'nullable|date',
            'site_id' => 'nullable|numeric|sometimes',
            'remote_provider_type' => 'nullable|numeric|sometimes',
            'remote_provider_id' => 'nullable|numeric',
        ]);
    }
}
