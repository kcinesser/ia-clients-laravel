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

    public function addTask($body) {
    	return $this->tasks()->create(compact('body'));
    }
}
