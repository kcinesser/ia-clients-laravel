<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Job;
use App\Task;

class TasksController extends Controller
{
    public function store(Client $client, Job $job) {
    	request()->validate(['body' => 'required']);
    	
    	$job->addTask(request('body'));

    	return redirect($job->path());
    }

    public function update(Client $client, Job $job, Task $task) {
    	request()->validate(['body' => 'required']);

    	$task->update([
    		'body' => request('body'),
    		'completed' => request()->has('completed')
    	]);

    	return redirect($job->path());
    }
}
