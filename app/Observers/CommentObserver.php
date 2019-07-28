<?php

namespace App\Observers;

use App\Comment;
use App\Job;
use App\Site;
use App\Client;
use Auth;

class CommentObserver
{
    /**
     * Handle the comment "created" event.
     *
     * @param  \App\Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        $user = Auth::user()->name;
        $change = '';
        $name = '';

        if ($comment->commentable_type == "App\Job") {
            $change = Job::find($comment->commentable_id);
            $name = $change->title;
        } elseif ($comment->commentable_type == "App\Client") {
            $change = Client::find($comment->commentable_id);
            $name = $change->name;
        } else if ($comment->commentable_type == "App\Site"){
            $change = Site::find($comment->commentable_id);
            $name = $change->name;
        }

        \App\Activity::create([
            'user_id' => Auth::user()->id,
            'activatable_type' => $comment->commentable_type,
            'activatable_id' => $change->id,
            'description' => $user . ' left a comment on ' . $name,
        ]);
    }

    /**
     * Handle the comment "updated" event.
     *
     * @param  \App\Comment  $comment
     * @return void
     */
    public function updated(Comment $comment)
    {
        //
    }

    /**
     * Handle the comment "deleted" event.
     *
     * @param  \App\Comment  $comment
     * @return void
     */
    public function deleted(Comment $comment)
    {
        //
    }

    /**
     * Handle the comment "restored" event.
     *
     * @param  \App\Comment  $comment
     * @return void
     */
    public function restored(Comment $comment)
    {
        //
    }

    /**
     * Handle the comment "force deleted" event.
     *
     * @param  \App\Comment  $comment
     * @return void
     */
    public function forceDeleted(Comment $comment)
    {
        //
    }
}
