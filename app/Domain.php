<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $guarded = [];

    public function project() {
    	return $this->belongsTo(Project::class);
    }

    public function registrar() {
        return $this->belongsTo(Registrar::class);
    }

    public function domain_account() {
        return $this->belongsTo(DomainAccount::class);
    }

    public function path() {
    	return "/clients/{$this->project->client->id}/projects/{$this->project->id}/domains/{$this->id}";
    }
}
