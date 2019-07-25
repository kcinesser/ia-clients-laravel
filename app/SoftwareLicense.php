<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoftwareLicense extends Model
{
    protected $guarded = [];

    public function project() {
    	return $this->belongsTo(Project::class);
    }

   public function path() {
    	return "/clients/{$this->project->client->id}/projects/{$this->project->id}/software-license/{$this->id}";
    }
}
