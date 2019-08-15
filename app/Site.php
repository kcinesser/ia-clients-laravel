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

    public function jobs() {
        return $this->hasMany(Job::class);
    }

    public function domains() {
    	return $this->hasMany(Domain::class);
    }

    public function updates() {
        return $this->hasMany(Update::class);
    }

    public function services() {
        return $this->belongsToMany(Service::class);
    }

    public function licenses() {
        return $this->morphMany(SoftwareLicense::class, 'licenseable');
    }
    
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function activities() {
        return $this->morphMany(Activity::class, 'activatable');
    }

    public function addDomain($attributes) {
        return $this->domains()->create($attributes);
    }

    public function host(){
        return $this->belongsTo(Hosting::class);
    }
}
