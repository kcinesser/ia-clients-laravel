<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests\SiteURLRequest;
use App\Site;
use App\SiteURL;

class SiteURLController extends Controller
{
    public function store (SiteURLRequest $request, Client $client, Site $site) {
    	$attributes = $request->validated();

    	$site->addURL($attributes);

    	return redirect($site->path());
    }

    public function destroy (Client $client, Site $site, SiteURL $url) {
    	$url->delete();

    	return redirect($site->path());
    }

    public function update (SiteURLRequest $request, Client $client, Site $site, SiteURL $url) {
    	$attributes = $request->validated();

    	$url->update($attributes);

    	return redirect($site->path());
    }
}
