<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $guarded = [];

    public function project() {
    	return $this->belongsTo(Project::class);
    }

    public function path() {
    	return "/clients/{$this->project->client->id}/projects/{$this->project->id}/domains/{$this->id}";
    }

    public function getRegistrar() {
    	$registrar = Registrar::where('id', $this->registrar_id)->first();

    	return ($registrar);
    }
}
