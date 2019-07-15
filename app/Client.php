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
    	return $this->projects()->create([
            'title' => $attributes['title'],
            'description' => $attributes['description']
        ]);
    }

    public function projects() {
    	return $this->hasMany(Project::class);
    }

    public function developer() {
        return $this->belongsTo(User::class);
    }

    public function accountManager() {
        return $this->belongsTo(User::class);
    }
}
