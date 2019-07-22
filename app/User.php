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
        'password', 'remember_token',
    ];

    public function clients() {
        $this->hasMany(Client::class);
    }

    public function projects() {
        $This->hasMany(Project::class);
    }

    public function comments() {
        $this->hasMany(Comment::class);
    }

    public function updates() {
        $this->hasMany(Update::class);
    }
}
