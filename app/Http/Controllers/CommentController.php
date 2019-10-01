<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Project;
use App\Comment;
use App\Http\Requests\CommentRequest;
use Auth;

class CommentController extends Controller
{

    public function store(CommentRequest $request, $model, $id) {
        $attributes = $request->validated();

    	$comment = new Comment();
        $comment->body = $attributes['body'];
        $comment->commentable_type = 'App\\' . ucfirst($model);
        $comment->commentable_id = $id;
        $comment->user_id = Auth::id();

        $comment->save();

        return redirect()->back();
    }

    public function update(CommentRequest $request, Comment $comment) {
        $attributes = $request->validated();

        $comment->update($attributes);

        return redirect()->back();
    }
}
