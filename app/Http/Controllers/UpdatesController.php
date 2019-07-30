<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Job;
use App\Update;
use Auth;

class UpdatesController extends Controller
{
	public function store(Client $client, Job $job) {
    	request()->validate(['description' => 'required']);
    	$attributes = request()->all();

    	$attributes['user_id'] = Auth::id();

    	$job->updates()->create($attributes);

    	return redirect($job->path());
	}

	public function update(Client $client, Job $job, Update $update) {
        $attributes = request()->validate([
            'description' => 'required', 
        ]);

        $update->update($attributes);

    	return redirect($job->path());
	}
}
