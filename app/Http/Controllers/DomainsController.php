<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Client;
use App\Site;
use App\Registrar;
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
    public function store(Client $client, Site $site, DomainAccount $account)
    {
        $attributes = $this->validate_data();

        $account = DomainAccount::create([
            'url' => 'test',
            'description' => 'test'
        ]);

        $domain = array(
            'name' => $attributes['name'],
            'exp_date' => $attributes['exp_date'],
            'site_id' => $site->id,
            'registrar_id' => $attributes['registrar_id'],
            'domain_account_id' => $account->id
        );

        $site->addDomain($domain);

        return redirect($site->path());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Client $client, Site $site, Domain $domain)
    {
        $domain->update($this->validate_data());

        return redirect($site->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, Site $site, Domain $domain)
    {
        $domain->delete();

        return redirect($site->path());
    }

    /**
     * Validates the form data
     */
    private function validate_data(){
        return request()->validate([
            'name' => 'required',
            'exp_date' => 'nullable|date',
            'registrar_id' => 'required'
        ]);
    }
}
