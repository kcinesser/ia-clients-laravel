<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteURL extends Model
{
    protected $guarded = [];
    protected $table = 'site_urls';

    public function site() {
    	return $this->belongsTo(Site::class);
    }

    public function path() {
    	return '/clients/' . $this->site->client->id . '/sites/' . $this->site->id . '/urls/' . $this->id;
    }
}
