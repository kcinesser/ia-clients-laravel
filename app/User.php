<?php

namespace App;

use App\Enums\ClientStatus;
use App\Enums\ProjectStatus;
use App\Enums\SiteStatus;
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

    public function dashboardProjects() {
        $projects = array();

        if ($this->role == 0) {
            $projects = $this->projects->whereNotIn('status', ProjectStatus::Archived);
        } elseif ($this->role == 1) {
            $projects = $this->accountManagerProjects->whereNotIn('status', ProjectStatus::Archived);
        }

        return $projects;
    }

    public function dashboardClients() {
        $clients = array();
        
        if ($this->role == 0) {
            $client_ids = Project::where('developer_id', $this->id)->pluck('client_id');
            $clients = Client::find($client_ids)->whereNotIn('status', ClientStatus::Archived);
        } else {
            $clients = $this->clients->whereNotIn('status', ClientStatus::Archived);
        }
        
        return $clients;
    }

    public function dashboardSites() {
        $sites = array();

        if ($this->role == 0) {
            $site_ids = Project::where('developer_id', $this->id)->pluck('site_id');
            $sites = Site::find($site_ids)->whereNotIn('status', SiteStatus::Archived);
        } else {
            $sites = Site::whereIn('client_id', $this->clients->pluck('id'))->get()->whereNotIn('status', SiteStatus::Archived);
        }
        
        return $sites;
    }


    public function clients() {
        return $this->hasMany(Client::class, 'account_manager_id');
    }

    public function accountManagerProjects() {
        return $this->hasManyThrough(Project::class, Client::class, 'account_manager_id');
    }

    public function projects() {
        return $this->hasMany(Project::class, 'developer_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function updates() {
        return $this->hasMany(Update::class);
    }
}
