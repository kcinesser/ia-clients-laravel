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

    public function create(Client $client) {
        $statuses = JobStatus::toSelectArray();

        return view('jobs.create', compact('client', 'statuses'));
    }

    public function store(Client $client) {
        $job = $client->addJob($this->validate_data());

        return redirect($job->path());
    }

    public function edit(Client $client, Job $job) {
        $statuses = JobStatus::toSelectArray();

        return view('jobs.edit', compact('client', 'job', 'statuses'));
    }

    public function update(Client $client, Job $job) {

        $job->update($this->validate_data());

        return redirect($job->path());
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

    private function validate_data(){
        return request()->validate([
            'title' => 'required',
            'site_id' => 'nullable|numeric',
            'description' => 'nullable',
            'status' => 'required|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'go_live_date' => 'nullable|date',
            'developer_id' => 'nullable|numeric',
            'technology' => 'nullable|numeric'
        ]);
    }

}
