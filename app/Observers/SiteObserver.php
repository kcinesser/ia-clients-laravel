<?php

namespace App\Observers;

use App\Site;
use Auth;

class SiteObserver
{
    /**
     * Handle the site "created" event.
     *
     * @param  \App\Site  $site
     * @return void
     */
    public function created(Site $site)
    {
        $user = Auth::user()->name;

        \App\Activity::create([
            'user_id' => Auth::user()->id,
            'activatable_type' => 'App\Site' ,
            'activatable_id' => $site->id,
            'description' => $user . ' created a new site: ' . $site->name . ' for ' . $site->client->name,
        ]);    
    }

    /**
     * Handle the site "updated" event.
     *
     * @param  \App\Site  $site
     * @return void
     */
    public function updated(Site $site)
    {
        //
    }

    /**
     * Handle the site "deleted" event.
     *
     * @param  \App\Site  $site
     * @return void
     */
    public function deleted(Site $site)
    {
        //
    }

    /**
     * Handle the site "restored" event.
     *
     * @param  \App\Site  $site
     * @return void
     */
    public function restored(Site $site)
    {
        //
    }

    /**
     * Handle the site "force deleted" event.
     *
     * @param  \App\Site  $site
     * @return void
     */
    public function forceDeleted(Site $site)
    {
        //
    }
}
