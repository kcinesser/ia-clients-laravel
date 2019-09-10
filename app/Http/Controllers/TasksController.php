<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Project;
use App\Task;

class TasksController extends Controller
{
    public function store(Client $client, Project $project) {
        $data = $this->validate_data();

    	$project->addTask($data['body']);

    	return redirect($project->path());
    }

    public function update(Client $client, Project $project, Task $task) {
    	$data = $this->validate_data();

    	$task->update([
    		'body' => $data['body'],
    		'completed' => request()->has('completed')
    	]);

    	return redirect($project->path());
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
