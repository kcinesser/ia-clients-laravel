<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Job;
use App\Task;

class TasksController extends Controller
{
    public function store(Client $client, Job $job) {
        $data = $this->validate_data();

    	$job->addTask($data['body']);

    	return redirect($job->path());
    }

    public function update(Client $client, Job $job, Task $task) {
    	$data = $this->validate_data();

    	$task->update([
    		'body' => $data['body'],
    		'completed' => request()->has('completed')
    	]);

    	return redirect($job->path());
    }

    /**
     * Validates form data
     */
    private function validate_data(){
         $rules = [
            'body' => 'required'
         ];
         $custom_messages = [
             'body.required' => 'Task name is required.'
         ];

        return $this->validate(request(), $rules, $custom_messages);
    }


}
