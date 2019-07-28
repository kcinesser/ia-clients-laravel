<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = [];

    public function path() {
        return "{$this->client->path()}/sites/{$this->id}";
    }

    public function client() {
    	return $this->belongsTo(Client::class);
    }

    public function jobs() {
        return $this->hasMany(Job::class);
    }

    public function domains() {
    	return $this->hasMany(Domain::class);
    }

    public function services() {
        return $this->belongsToMany(Service::class);
    }

    public function tasks() {
        return $this->morphMany(Task::class, 'taskable');
    }
    
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function activities() {
        return $this->morphMany(Activity::class, 'activatable');
    }

    public function addDomain($attributes) {
        return $this->domains()->create($attributes);
    }
}
