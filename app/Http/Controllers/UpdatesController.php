<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Project;
use App\Update;
use Auth;

class UpdatesController extends Controller
{
	public function store(Client $client, Project $project) {
    	request()->validate(['description' => 'required']);
    	$attributes = request()->all();

    	$attributes['user_id'] = Auth::id();

    	$project->updates()->create($attributes);

    	return redirect($project->path());
	}

	public function update(Client $client, Project $project, Update $update) {
        $attributes = request()->validate([
            'description' => 'required', 
        ]);

        $update->update($attributes);

    	return redirect($project->path());
	}
}
