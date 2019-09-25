<?php

namespace App\Http\Controllers;

use App\Site;
use App\Client;
use App\Enums\ProjectStatus;
use App\Enums\SiteStatus;
use App\Service;
use App\HostedDomain;
use App\Hosting;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\SiteRequest;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {
        $sites = Site::all()->whereNotIn('status', SiteStatus::Archived);

        return view('sites.index', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteRequest $request, Client $client)
    {
        $attributes = $request->validated();
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
        $projects = $site->projects->whereNotIn('status', ProjectStatus::Archived);
        $archived_projects = $site->projects->whereIn('status', ProjectStatus::Archived);

        return view('sites.show' , compact('client', 'site', 'services', 'projects', 'archived_projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(SiteRequest $request, Client $client, Site $site)
    {
        $attributes = $request->validated();

        if(isset($attributes['services']) ){
            //update services and remove it from attributes
            $site->services()->sync($attributes['services']);
            unset($attributes['services']);
        }

        $site->update($attributes);

        return redirect($site->path());
    }

    public function destroy(Client $client, Site $site) {
        $site->favorite->delete();
        $site->delete();

        return redirect($client->path());
    }

    /**
     * Sync the services changes made by user.
     *
     * @param Client $client
     * @param Site $site
     * @return \Illuminate\Http\RedirectResponse
     */
    public function services(Client $client, Site $site){
        //validate data

        $data = request()->validate([
            'services' => 'nullable|array',
            'services.*' => 'numeric'
        ]);

        $site->services()->sync(!empty($data['services']) ? $data['services'] : null);
        return back();
    }

    public function all_archives() {
        $archive_sites = Site::all()->where('status', SiteStatus::Archived);

        return view('sites.all_archive', compact('archive_sites'));
    }

    public function client_site_archives(Client $client) {
        $archived_sites = $client->sites->where('status', SiteStatus::Archived);

        return view('sites.archive', compact('archived_sites', 'client'));
    }

    public function archive(Client $client, Site $site) {
        $site->update([
            'status' => SiteStatus::Archived
        ]);

        return redirect($client->path());
    }
}
