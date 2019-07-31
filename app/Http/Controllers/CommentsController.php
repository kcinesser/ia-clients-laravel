<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Job;
use App\Comment;
use Auth;

class CommentsController extends Controller
{

    public function store(Request $request, $model, $id) {
    	$comment = new Comment();
        $comment->body = request('body');
        $comment->commentable_type = 'App\\' . ucfirst($model);
        $comment->commentable_id = $id;
        $comment->user_id = Auth::id();

        $comment->save();

        return redirect()->back();
    }

    public function update(Comment $comment) {
        $attributes = request()->validate([
            'body' => 'required', 
        ]);

        $comment->update($attributes);

        return redirect()->back();
    }
}
