<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Project;
use App\Task;

class ProjectTasksController extends Controller
{
    public function store(Client $client, Project $project) {
    	request()->validate(['body' => 'required']);
    	
    	$project->addTask(request('body'));

    	return redirect($project->path());
    }

    public function update(Client $client, Project $project, Task $task) {
    	request()->validate(['body' => 'required']);

    	$task->update([
    		'body' => request('body'),
    		'completed' => request()->has('completed')
    	]);

    	return redirect($project->path());
    }
}
