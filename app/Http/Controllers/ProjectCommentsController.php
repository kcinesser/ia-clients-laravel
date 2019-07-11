<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Project;
use App\Comment;

class ProjectCommentsController extends Controller
{


 public function store(Client $client, Project $project) {
    	request()->validate(['body' => 'required']);
    	
    	$project->addComment(request('body'));

    	return redirect($project->path());
    }

    public function update(Client $client, Project $project, Comment $comment) {
    	request()->validate(['body' => 'required']);

    	$comment->update([
    		'body' => request('body')
    	]);

    	return redirect($project->path());
    }

}
