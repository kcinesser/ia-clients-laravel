<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    protected $touches = ['project'];

    public function project() {
    	return $this->belongsTo(Project::class);
    }

    public function path() {
    	return "/clients/{$this->project->client->id}/projects/{$this->project->id}/tasks/{$this->id}";
    }
}
