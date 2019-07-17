<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    public function path() {
        return "/clients/{$this->id}";
    }  

    public function addProject($attributes) {
    	$project = $this->projects()->create([
            'title' => $attributes['title'],
            'description' => $attributes['description'],
            'technology' => $attributes['technology']
        ]);

        $project->services()->attach($attributes['service_id']);

        return $project;
    }

    public function projects() {
    	return $this->hasMany(Project::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function developer() {
        return $this->belongsTo(User::class);
    }

    public function accountManager() {
        return $this->belongsTo(User::class);
    }
}
