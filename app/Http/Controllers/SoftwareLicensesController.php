<?php

namespace App\Http\Controllers;

use App\SoftwareLicense;
use App\Client;
use App\Project;
use Illuminate\Http\Request;


class SoftwareLicensesController extends Controller
{

    public function store(Client $client, Project $project, SoftwareLicense $license)
    {
        request()->validate([
            'description' => 'required',
            'key' => 'required'
        ]);

        $attributes = request()->all();

        $project->addLicense($attributes);

        return redirect($project->path());
    }


    public function update(Client $client, Project $project, SoftwareLicense $softwareLicense)
    {
        request()->validate([
            'description' => 'required',
            'key' => 'required'
        ]);

        $attributes = request()->all();

        $softwareLicense->update($attributes);

        return redirect($project->path());
    }

    public function destroy(Client $client, Project $project, SoftwareLicense $softwareLicense)
    {
        $softwareLicense->delete();

        return redirect($project->path());
    }
}
