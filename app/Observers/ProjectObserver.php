<?php

namespace App\Observers;

use App\Project;
use Auth;

class ProjectObserver
{
    /**
     * Handle the project "created" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function created(Project $project)
    {
        $user = Auth::user()->name;

        \App\Activity::create([
            'user_id' => Auth::user()->id,
            'activatable_type' => 'App\Client' ,
            'activatable_id' => $project->client->id,
            'description' => $user . ' created a new project for ' . $project->client->name . ': ' . $project->title,
        ]);
    }

    /**
     * Handle the project "updated" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function updated(Project $project)
    {
        $user = Auth::user()->name;

        \App\Activity::create([
            'user_id' => Auth::user()->id,
            'activatable_type' => 'App\Project' ,
            'activatable_id' => $project->id,
            'description' => $user . ' edited ' . $project->title,
        ]);
    }

    /**
     * Handle the project "deleted" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function deleted(Project $project)
    {
        //
    }

    /**
     * Handle the project "restored" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function restored(Project $project)
    {
        //
    }

    /**
     * Handle the project "force deleted" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {
        //
    }
}
