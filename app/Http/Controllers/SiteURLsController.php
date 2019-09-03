<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Site;
use App\SiteURL;

class SiteURLsController extends Controller
{
    public function store (Client $client, Site $site) {
    	$attributes = request()->validate([
    		'url' => 'required|url',
    		'type' => 'required|numeric',
    		'environment' => 'required|numeric'
    	]);

    	$site->addURL($attributes);

    	return redirect($site->path());
    }

    public function destroy (Client $client, Site $site, SiteURL $url) {
    	$url->delete();

    	return redirect($site->path());
    }

    public function update (Client $client, Site $site, SiteURL $url) {
    	$attributes = request()->validate([
    		'url' => 'required|url',
    		'type' => 'required|numeric',
    		'environment' => 'required|numeric'
    	]);

    	$url->update($attributes);

    	return redirect($site->path());
    }
}
