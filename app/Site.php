<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = [];

    public function client() {
    	return $this->belongsTo(Client::class);
    }

    public function jobs() {
        return $this->hasMany(Job::class);
    }

    public function urls() {
        return $this->hasMany(SiteURL::class);
    }

    public function hosted_domains() {
    	return $this->hasMany(HostedDomain::class);
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

    public function host(){
        return $this->belongsTo(Hosting::class);
    }

    public function path() {
        return "{$this->client->path()}/sites/{$this->id}";
    }

    public function hasJobArchive() {
        foreach($this->jobs as $job) {
            if($job->status == 3) {
                return true;
            } 
        }

        return false;
    }

    public function addURL($attributes) {
        return $this->urls()->create($attributes);
    }
}
