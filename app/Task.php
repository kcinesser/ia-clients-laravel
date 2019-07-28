<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    protected $touches = ['job'];

    public function job() {
    	return $this->belongsTo(Job::class);
    }

    public function path() {
    	return "/clients/{$this->job->client->id}/jobs/{$this->job->id}/tasks/{$this->id}";
    }
}
