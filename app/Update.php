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
    	return $this->belongsTo(Job::class);
    }

    public function path() {
    	return "/clients/{$this->job->client->id}/jobs/{$this->job->id}/updates/{$this->id}";
    }
}
