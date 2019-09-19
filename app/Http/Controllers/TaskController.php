<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests\TaskRequest;
use App\Project;
use App\Task;

class TaskController extends Controller
{
    public function store(TaskRequest $request, Client $client, Project $project) {
        $attributes = $request->validated();

    	$project->addTask($attributes);

    	return redirect($project->path());
    }

    public function update(TaskRequest $request, Client $client, Project $project, Task $task) {
    	$attributes = $request->validated();

    	$task->update([
    		'body' => $attributes['body'],
    		'completed' => request()->has('completed')
    	]);

    	return redirect($project->path());
    }
}
