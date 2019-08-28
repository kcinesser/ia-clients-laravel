<?php

namespace App\Http\Controllers;

use App\Site;
use App\Client;
use App\Service;
use App\Domain;
use App\Hosting;
use Illuminate\Http\Request;

class SitesController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        $services = Service::all();
        $hosting = Hosting::all()->sortBy('name');

        return view('sites.create', compact('client', 'services', 'hosting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Client $client)
    {

        $site = $client->addSite($this->validate_data());
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
        $jobs = $site->jobs->whereNotIn('status', 3);

        return view('sites.show' , compact('client', 'site', 'services', 'jobs'));
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
        $attributes = $this->validate_data();

        if(isset($attributes['services']) ){
            //update services and remove it from attributes
            $site->services()->sync($attributes['services']);
            unset($attributes['services']);
        }

        $site->update($attributes);

        return redirect($site->path());
    }

    public function destroy(Client $client, Site $site) {
        $site->delete();

        return redirect($client->path());
    }


    public function notes(Client $client, Site $site) {
        $site->update(
            request()->validate([
                'notes' => 'nullable',
                'update_instructions' => 'nullable'
            ])
        );

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
        //validate data

        $data = request()->validate([
            'services' => 'nullable|array',
            'services.*' => 'numeric'
        ]);

        $site->services()->sync(!empty($data['services']) ? $data['services'] : null);
        return back();
    }

    /**
     * Validates form data
     */
    private function validate_data(){
        return request()->validate([
            'name' => 'required|sometimes',
            'URL' => 'required|sometimes',
            'registrar' => 'required|numeric|sometimes',
            'exp_date' => 'nullable|date',
            'description' => 'nullable',
            'status' => 'required|numeric|sometimes',
            'technology' => 'required|numeric|sometimes',
            'host_id' => 'required|numeric|sometimes',
            'services' => 'nullable|array',
            'services.*' => 'numeric',
            'prev_dev' => 'nullable'
        ]);
    }

    public function all_archives() {
        $archive_sites = Site::all()->where('status', 4);

        return view('sites.all_archive', compact('archive_sites'));
    }

    public function archives(Client $client) {
        $archived_sites = $client->sites->where('status', 4);

        return view('sites.archive', compact('archived_sites', 'client'));
    }

    public function archive(Client $client, Site $site) {
        $site->update([
            'status' => 4
        ]);

        return redirect($client->path());
    }

    public function mma() {
        $mma_sites = Service::with('sites')->where('id', 1)->get()->pluck('sites')->flatten();
        $mma_sites = $mma_sites->sortBy('name');
        $mma_internal_sites = Service::with('sites')->where('id', 5)->get()->pluck('sites')->flatten();
        $mma_internal_sites = $mma_internal_sites->sortBy('name');

        return view('mma.index', compact('mma_sites', 'mma_internal_sites'));
    }
}
