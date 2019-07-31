<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];

    public function path() {
        return "/clients/{$this->client->id}/jobs/{$this->id}";
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

    public function licenses() {
        return $this->morphMany(SoftwareLicense::class, 'licenseable');
    }

    public function tasks() {
    	return $this->hasMany(Task::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
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

    public function addTask($body) {
    	return $this->tasks()->create(compact('body'));
    }

    public function addComment($body) {
        return $this->comments()->create(compact('body'));
    }

    public function addLicense($attributes) {
        return $this->licenses()->create($attributes);
    }
}