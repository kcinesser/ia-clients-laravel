<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DomainAccount extends Model
{
    protected $guarded = [];

    public function domain() {
    	return $this->hasMany(Domain::class);
    }
}
