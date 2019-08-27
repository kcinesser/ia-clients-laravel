<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\JobStatus;
use App\Job;
use App\Client;

class JobsController extends Controller
{
    public function index() {
        $jobs = Job::all();

        return view('jobs.index', compact('jobs'));
    }

    public function show(Client $client, Job $job) {
        return view('jobs.show', compact('job', 'client'));
    }

    public function store(Client $client) {
        $job = $client->addJob($this->validate_data());

        return redirect($job->path());
    }

    public function update(Client $client, Job $job) {

        $job->update($this->validate_data());

        return redirect($job->path());
    }

    public function destroy(Client $client, Job $job) {
        $job->delete();

        return redirect($client->path());
    }

    public function notes(Client $client, Job $job) {

        $job->update(request()->validate([
            'notes' => 'nullable',
        ]));

        return redirect($job->path());
    }

    public function archives(Client $client) {
        $archived_jobs = Job::all()->where('status', 3);

        return view('jobs.archive', compact('archived_jobs', 'client'));
    }

    public function archive(Client $client, Job $job) {
        $job->update([
            'status' => 3
        ]);

        return redirect($client->path());
    }

    public function all_archives() {
        $archive_jobs = Job::all()->where('status', 3);

        return view('jobs.all_archive', compact('archive_jobs'));
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
