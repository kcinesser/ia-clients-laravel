<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\ProjectStatus;
use App\Project;
use App\Client;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all()->whereNotIn('status', ProjectStatus::Archived);

        return view('projects.index', compact('projects'));
    }

    public function show(Client $client, Project $project) {
        return view('projects.show', compact('project', 'client'));
    }

    public function store(ProjectRequest $request, Client $client) {
        $attributes = $request->validated();
        $project = $client->addProject($attributes);

        return redirect($project->path());
    }

    public function update(ProjectRequest $request, Client $client, Project $project) {
        $attributes = $request->validated();
        $project->update($attributes);

        return redirect($project->path());
    }

    public function destroy(Client $client, Project $project) {
        $project->delete();

        return redirect($client->path());
    }

    public function client_project_archives(Client $client) {
        $archived_projects = $client->projects->where('status', ProjectStatus::Archived);

        return view('projects.archive', compact('archived_projects', 'client'));
    }

    public function archive(Client $client, Project $project) {
        $project->update([
            'status' => ProjectStatus::Archived
        ]);

        return redirect($client->path());
    }

    public function all_archives() {
        $archive_projects = Project::all()->where('status', ProjectStatus::Archived);

        return view('projects.all_archive', compact('archive_projects'));
    }
}
