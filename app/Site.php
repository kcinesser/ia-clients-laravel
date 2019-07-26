<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = [];

    public function path() {
        return "{$this->client->path()}/sites/{$this->id}";
    }

    public function client() {
    	return $this->belongsTo(Client::class);
    }

    public function domains() {
    	return $this->hasMany(Domain::class);
    }

    public function services() {
        return $this->belongsToMany(Service::class);
    }

    public function addDomain($attributes) {
        return $this->domains()->create($attributes);
    }
}
