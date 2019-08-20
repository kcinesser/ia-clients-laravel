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
        $attributes = request()->all();

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
        $domain->update(request()->all());

        return redirect($site->path());
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
