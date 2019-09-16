<?php

namespace App;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = [];

    public function client() {
    	return $this->belongsTo(Client::class);
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function urls() {
        return $this->hasMany(SiteURL::class);
    }

    public function hostedDomains() {
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

   public function uploads() {
        return $this->morphMany(Upload::class, 'uploadable');
    }

    public function projectUploads() {
        return $this->hasManyThrough(Upload::class, Project::class, null, 'uploadable_id')->where('uploadable_type', Project::class);
    }

    public function path() {
        return "{$this->client->path()}/sites/{$this->id}";
    }

    public function hasProjectArchive() {
        foreach($this->projects as $project) {
            if($project->status == ProjectStatus::Archived) {
                return true;
            } 
        }

        return false;
    }

    public function addURL($attributes) {
        return $this->urls()->create($attributes);
    }
}
