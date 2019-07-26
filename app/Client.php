<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    public function path() {
        return "/clients/{$this->id}";
    }  

    public function archivePath() {
        return "/clients/{$this->id}/jobs/archives";
    }

    public function addJob($attributes) {
    	$job = $this->jobs()->create([
            'title' => $attributes['title'],
            'description' => $attributes['description'],
            'technology' => $attributes['technology'],
            'developer_id' => $attributes['developer_id']
        ]);

        return $job;
    }

    public function addSite($attributes) {
        $site = $this->sites()->create($attributes);

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
