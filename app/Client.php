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
            $account = DomainAccount::create([
                'url' => 'test',
                'description' => 'test'
            ]);

            $site->domains()->create([
                'name' => $attributes['URL'],
                'exp_date' => $attributes['exp_date'],
                'registrar_id' => $attributes['registrar'],
                'domain_account_id' => $account->id
            ]);
        }

        //add any services
        $site->services()->attach(request()->services);

        return $site;
    }

    public function sites() {
        return $this->hasMany(Site::class);
    }

    public function jobs() {
    	return $this->hasMany(Job::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function accountManager() {
        return $this->belongsTo(User::class);
    }

    public function activities() {
        return $this->morphMany(Activity::class, 'activatable');
    }
}
