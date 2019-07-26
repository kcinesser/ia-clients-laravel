<?php

namespace App\Observers;

use App\Job;
use Auth;

class JobObserver
{
    /**
     * Handle the job "created" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function created(Job $job)
    {
        $user = Auth::user()->name;

        \App\Activity::create([
            'user_id' => Auth::user()->id,
            'activatable_type' => 'App\Client' ,
            'activatable_id' => $job->client->id,
            'description' => $user . ' created a new job for ' . $job->client->name . ': ' . $job->title,
        ]);
    }

    /**
     * Handle the job "updated" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function updated(Job $job)
    {
        $user = Auth::user()->name;

        \App\Activity::create([
            'user_id' => Auth::user()->id,
            'activatable_type' => 'App\Job' ,
            'activatable_id' => $job->id,
            'description' => $user . ' edited ' . $job->title,
        ]);
    }
}
