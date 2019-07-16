<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    //protected $touches = ['project'];

    public function commentable() {
    	return $this->morphTo();
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }
}