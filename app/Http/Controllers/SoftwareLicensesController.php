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
        $attributes = request()->validate([
            'description' => 'required',
            'license' => 'required'
        ]);

        $project->addLicense($attributes);

        return redirect($project->path());
    }


    public function update(Client $client, Project $project, SoftwareLicense $softwareLicense)
    {
        $attributes = request()->validate([
            'description' => 'required',
            'license' => 'required'
        ]);

        $softwareLicense->update($attributes);

        return redirect($project->path());
    }

    public function destroy(Client $client, Project $project, SoftwareLicense $softwareLicense)
    {
        $softwareLicense->delete();

        return redirect($project->path());
    }
}
