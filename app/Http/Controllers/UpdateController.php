<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests\UpdateRequest;
use App\Site;
use App\Update;
use Carbon;
use Auth;

class UpdateController extends Controller
{
	public function store(UpdateRequest $request, Client $client, Site $site) {
    	$attributes = $request->validated();
    	$attributes['user_id'] = Auth::id();

    	$site->updates()->create($attributes);

    	return redirect($site->path());
	}

	public function update(UpdateRequest $request, Client $client, Site $site, Update $update) {
		$attributes = $request->validated();
		$update->update($attributes);
		
    	return redirect($site->path());
	}
}
