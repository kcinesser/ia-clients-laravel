<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Client;

class ProjectsController extends Controller
{
    public function index() {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function show(Client $client, Project $project) {
        return view('projects.show', compact('project', 'client'));
    }

    public function create(Client $client) {
        return view('projects.create', compact('client'));
    }

    public function store(Client $client) {
        $attributes = request()->validate([
            'title' => 'required', 
            'description' => 'required'
        ]);
        $attributes = request()->all();

        $project = $client->addProject($attributes);

        return redirect($project->path());
    }

    public function edit(Client $client, Project $project) {
        return view('projects.edit', compact('project'));
    }

    public function update(Client $client, Project $project) {
        $attributes = request()->validate([
            'title' => 'sometimes|required', 
            'description' => 'sometimes|required'
        ]);
        $attributes = request()->all();
        $project->update($attributes);

        return redirect($project->path());
    }
}
