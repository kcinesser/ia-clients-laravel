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
        $attributes = request()->validate([
            'title' => 'required', 
            'description' => 'required'
        ]);
        $attributes = request()->all();

        $job = $client->addJob($attributes);

        return redirect($job->path());
    }

    public function edit(Client $client, Job $job) {
        $statuses = JobStatus::toSelectArray();

        return view('jobs.edit', compact('job', 'statuses'));
    }

    public function update(Client $client, Job $job) {
        $attributes = request()->validate([
            'title' => 'sometimes|required', 
            'description' => 'sometimes|required'
        ]);
        $attributes = request()->all();

        $job->update(['title' => $attributes['title'],
            'description' => $attributes['description'],
            'technology' => $attributes['technology'],
            'developer_id' => $attributes['developer_id'],
            'status' => $attributes['status']
        ]);

        return redirect($job->path());
    }

    public function notes(Client $client, Job $job) {
        $attributes = request()->all();

        $job->update($attributes);

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
}
