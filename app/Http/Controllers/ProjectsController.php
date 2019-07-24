<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\ProjectStatus;
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
        $statuses = ProjectStatus::toSelectArray();

        return view('projects.create', compact('client', 'statuses'));
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
        $statuses = ProjectStatus::toSelectArray();

        return view('projects.edit', compact('project', 'statuses'));
    }

    public function update(Client $client, Project $project) {
        $attributes = request()->validate([
            'title' => 'sometimes|required', 
            'description' => 'sometimes|required'
        ]);
        $attributes = request()->all();

        $project->update(['title' => $attributes['title'],
            'description' => $attributes['description'],
            'technology' => $attributes['technology'],
            'developer_id' => $attributes['developer_id'],
            'status' => $attributes['status']
        ]);

        $project->services()->detach();
        $project->services()->attach($attributes['service_id']);;

        return redirect($project->path());
    }

    public function notes(Client $client, Project $project) {
        $attributes = request()->all();

        $project->update($attributes);

        return redirect($project->path());
    }

    public function archives(Client $client) {
        $archived_projects = Project::all()->where('status', 3);

        return view('projects.archive', compact('archived_projects', 'client'));
    }

    public function archive(Client $client, Project $project) {
        $project->update([
            'status' => 3
        ]);

        return redirect($client->path());
    }
}
