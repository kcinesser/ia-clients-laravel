<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Site;
use App\Update;
use Auth;

class UpdatesController extends Controller
{
	public function store(Client $client, Site $site) {
    	request()->validate(['description' => 'required']);
    	$attributes = request()->all();

    	$attributes['user_id'] = Auth::id();

    	$site->updates()->create($attributes);

    	return redirect($site->path());
	}

	public function update(Client $client, Site $site, Update $update) {
        $attributes = request()->validate([
            'description' => 'required', 
        ]);

        $update->update($attributes);

    	return redirect($site->path());
	}
}
