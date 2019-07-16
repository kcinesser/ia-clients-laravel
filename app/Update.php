<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    protected $guarded = [];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function project() {
    	return $this->belongsTo(Project::class);
    }

    public function path() {
    	return "/clients/{$this->project->client->id}/projects/{$this->project->id}/updates/{$this->id}";
    }
}
