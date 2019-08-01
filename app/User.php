<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'provider_name', 'provider_id', 'password', 'remember_token',
    ];


    public function initials() {
        $names = explode(" ", $this->name);
        $initials = "";

        foreach ($names as $name) {
            $initials .= $name[0];
        }

        return $initials;
    }

    public function dashboardJobs() {
        $jobs = array();

        if ($this->role == 0) {
            $jobs = $this->jobs->whereNotIn('status', 3);
        } elseif ($this->role == 1) {
            $jobs = $this->accountManagerJobs->whereNotIn('status', 3);
        }

        return $jobs;
    }

    public function dashboardClients() {
        $clients = array();
        
        if ($this->role == 0) {
            $client_ids = Job::where('developer_id', $this->id)->pluck('client_id');
            $clients = Client::find($client_ids);
        } else {
            $clients = $this->clients;
        }
        
        return $clients;
    }

    public function clients() {
        return $this->hasMany(Client::class, 'account_manager_id');
    }

    public function accountManagerJobs() {
        return $this->hasManyThrough(Job::class, Client::class, 'account_manager_id');
    }

    public function jobs() {
        return $this->hasMany(Job::class, 'developer_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function updates() {
        return $this->hasMany(Update::class);
    }
}
