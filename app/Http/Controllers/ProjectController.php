<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\ProjectStatus;
use App\Project;
use App\Client;

class ProjectController extends Controller
{
    public function show(Client $client, Project $project) {
        return view('projects.show', compact('project', 'client'));
    }

    public function store(Client $client) {
        $project = $client->addProject($this->validate_data());

        return redirect($project->path());
    }

    public function update(Client $client, Project $project) {

        $project->update($this->validate_data());

        return redirect($project->path());
    }

    public function destroy(Client $client, Project $project) {
        $project->delete();

        return redirect($client->path());
    }

    public function notes(Client $client, Project $project) {

        $project->update(request()->validate([
            'notes' => 'nullable',
        ]));

        return redirect($project->path());
    }

    public function client_project_archives(Client $client) {
        $archived_projects = $client->projects->where('status', 3);

        return view('projects.archive', compact('archived_projects', 'client'));
    }

    public function archive(Client $client, Project $project) {
        $project->update([
            'status' => 3
        ]);

        return redirect($client->path());
    }

    public function all_archives() {
        $archive_projects = Project::all()->where('status', 3);

        return view('projects.all_archive', compact('archive_projects'));
    }

    private function validate_data(){
        return request()->validate([
            'title' => 'required|sometimes',
            'site_id' => 'nullable|numeric|sometimes',
            'description' => 'nullable|sometimes',
            'status' => 'required|numeric|sometimes',
            'start_date' => 'nullable|date|sometimes',
            'end_date' => 'nullable|date|sometimes',
            'go_live_date' => 'nullable|date|sometimes',
            'developer_id' => 'nullable|numeric|sometimes',
            'technology' => 'nullable|numeric|sometimes'
        ]);
    }

}
