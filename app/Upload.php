<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $guarded = [];

    public function uploadable() {
        return $this->morphTo();
    }

    public function user() {
    	return $this->belongsTo(User::class());
    }
}
