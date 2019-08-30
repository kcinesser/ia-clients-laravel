<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Client;
use App\Site;
use App\DomainAccount;
use Illuminate\Http\Request;

class DomainsController extends Controller
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

        if(isset($attributes['site_id'])) {
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
    public function update(Client $client, Domain $domain)
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
    public function destroy(Client $client, Domain $domain)
    {
        $domain->delete();

        return redirect($client->path());
    }

    /**
     * Validates the form data
     */
    private function validate_data(){
        return request()->validate([
            'name' => 'required',
            'exp_date' => 'nullable|date',
            'site_id' => 'nullable|numeric|sometimes'
        ]);
    }
}
