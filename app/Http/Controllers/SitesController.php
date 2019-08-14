<?php

namespace App\Http\Controllers;

use App\Site;
use App\Client;
use App\Service;
use App\Domain;
use Illuminate\Http\Request;

class SitesController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Client $client)
    {
        $attributes = request()->all();

        $site = $client->addSite($attributes);

        return redirect($site->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, Site $site)
    {
        $services = Service::all();

        return view('sites.show' , compact('client', 'site', 'services'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Client $client, Site $site)
    {
        $attributes = request()->all();

        //update services and remove it from attributes
        $site->services()->sync(request()->services);
        unset($attributes['services']);

        $site->update($attributes);

        return redirect($site->path());
    }


    public function notes(Client $client, Site $site) {
        $attributes = request()->all();

        $site->update($attributes);

        return redirect($site->path());
    }

    /**
     * Sync the services changes made by user.
     *
     * @param Client $client
     * @param Site $site
     * @return \Illuminate\Http\RedirectResponse
     */
    public function services(Client $client, Site $site){
        $site->services()->sync(request()->services);
        return back();
    }
}
