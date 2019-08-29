<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteURL extends Model
{
    protected $guarded = [];
    protected $table = 'site_urls';

    public function site() {
    	$this->belongsTo(Sitee::class);
    }
}
