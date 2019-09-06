<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    public function path() {
        return "/clients/{$this->id}";
    }  

    public function jobArchivePath() {
        return "/clients/{$this->id}/jobs/archives";
    }

    public function siteArchivePath() {
        return "/clients/{$this->id}/sites/archives";
    }

    public function hasSiteArchive() {
        foreach($this->sites as $site) {
            if($site->status == 4) {
                return true;
            } 
        }

        return false;
    }

    public function hasJobArchive() {
        foreach($this->jobs as $job) {
            if($job->status == 3) {
                return true;
            } 
        }

        return false;
    }

    public function addJob($attributes) {
    	$job = $this->jobs()->create($attributes);

        return $job;
    }

    public function addSite($attributes) {
        $site = $this->sites()->create([
            'name' => $attributes['name'],
            'technology' => $attributes['technology'],
            'status' => $attributes['status'],
            'host_id' => $attributes['host_id'],
            'prev_dev' => $attributes['prev_dev']
        ]);

        if ($attributes['URL']) {
            $site->urls()->create(['url' => $attributes['URL']]);
        }

        //add any services
        $site->services()->attach(request()->services);

        return $site;
    }

    public function addDomain($attributes) {
        return $this->hosted_domains()->create($attributes);
    }

    public function sites() {
        return $this->hasMany(Site::class);
    }

    public function hosted_domains() {
        return $this->hasMany(HostedDomain::class);
    }

    public function jobs() {
    	return $this->hasMany(Job::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function uploads() {
        return $this->morphMany(Upload::class, 'uploadable');
    }

    public function site_uploads() {
        return $this->hasManyThrough(Upload::class, Site::class, null, 'uploadable_id')->where('uploadable_type', Site::class);
    }

    public function job_uploads() {
        return $this->hasManyThrough(Upload::class, Job::class, null, 'uploadable_id')->where('uploadable_type', Job::class);
    }

    public function accountManager() {
        return $this->belongsTo(User::class);
    }

    public function activities() {
        return $this->morphMany(Activity::class, 'activatable');
    }
}
