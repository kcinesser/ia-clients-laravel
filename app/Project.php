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

    public function site() {
        return $this->belongsTo(Site::class);
    }

    public function developer() {
        return $this->belongsTo(User::class);
    }

    public function tasks() {
    	return $this->hasMany(Task::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function favorite() {
        return $this->morphOne(Favorite::class, 'favoriteable');
    }

    public function activities() {
        return $this->morphMany(Activity::class, 'activatable');
    }
    
    public function updates() {
        return $this->hasMany(Update::class);
    }

    public function services() {
        return $this->belongsToMany(Service::class);
    }

    public function uploads() {
        return $this->morphMany(Upload::class, 'uploadable');
    }

    public function addTask($task) {
    	return $this->tasks()->create($task);
    }
}
