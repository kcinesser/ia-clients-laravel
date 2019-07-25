<?php

namespace App\Observers;

use App\Client;
use Auth;

class ClientObserver
{
    /**
     * Handle the client "created" event.
     *
     * @param  \App\Client  $client
     * @return void
     */
    public function created(Client $client)
    {
        $user = Auth::user()->name;

        \App\Activity::create([
            'user_id' => Auth::user()->id,
            'activatable_type' => 'App\Client' ,
            'activatable_id' => $client->id,
            'description' => $user . ' created a new client: ' . $client->name,
        ]);    
    }

    /**
     * Handle the client "updated" event.
     *
     * @param  \App\Client  $client
     * @return void
     */
    public function updated(Client $client)
    {
        $user = Auth::user()->name;

        \App\Activity::create([
            'user_id' => Auth::user()->id,
            'activatable_type' => 'App\Client' ,
            'activatable_id' => $client->id,
            'description' => $user . ' made edits to ' . $client->name,
        ]);    
    }

    /**
     * Handle the client "deleted" event.
     *
     * @param  \App\Client  $client
     * @return void
     */
    public function deleted(Client $client)
    {
        //
    }

    /**
     * Handle the client "restored" event.
     *
     * @param  \App\Client  $client
     * @return void
     */
    public function restored(Client $client)
    {
        //
    }

    /**
     * Handle the client "force deleted" event.
     *
     * @param  \App\Client  $client
     * @return void
     */
    public function forceDeleted(Client $client)
    {
        //
    }
}
