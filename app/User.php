<?php

namespace App;

use App\Enums\ClientStatus;
use App\Enums\ProjectStatus;
use App\Enums\SiteStatus;
use App\Enums\UserTypes;
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

    public function clients() {
        return $this->hasMany(Client::class, 'account_manager_id');
    }

    public function accountManagerProjects() {
        return $this->hasManyThrough(Project::class, Client::class, 'account_manager_id');
    }

    public function developerProjects() {
        return $this->hasMany(Project::class, 'developer_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function updates() {
        return $this->hasMany(Update::class);
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }
}
