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

    public function tasks() {
    	return $this->hasMany(Task::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function domains() {
        return $this->hasMany(Domain::class);
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
}
