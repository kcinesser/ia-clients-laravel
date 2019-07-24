<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function path() {
        return "/clients/{$this->client->id}/projects/{$this->id}";
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function developer() {
        return $this->belongsTo(User::class);
    }

    public function licenses() {
        return $this->hasMany(SoftwareLicense::class);
    }

    public function tasks() {
    	return $this->hasMany(Task::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function domains() {
        return $this->hasMany(Domain::class);
    }

    public function updates() {
        return $this->hasMany(Update::class);
    }

    public function services() {
        return $this->belongsToMany(Service::class);
    }

    public function addTask($body) {
    	return $this->tasks()->create(compact('body'));
    }

    public function addComment($body) {
        return $this->comments()->create(compact('body'));
    }

    public function addDomain($attributes) {
        return $this->domains()->create($attributes);
    }

    public function addLicense($attributes) {
        return $this->licenses()->create($attributes);
    }
}
