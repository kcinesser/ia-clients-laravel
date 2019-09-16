<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoftwareLicense extends Model
{
    protected $guarded = [];

    public function licenseable() {
    	return $this->morphTo();
    }
}
