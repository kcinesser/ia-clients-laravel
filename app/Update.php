<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    protected $guarded = [];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function site() {
    	return $this->belongsTo(Site::class);
    }

    public function path() {
    	return "/clients/{$this->site->client->id}/sites/{$this->site->id}/updates/{$this->id}";
    }

    public function mmaPath() {
        return "/clients/{$this->site->client->id}/sites/{$this->site->id}/mma-update/{$this->id}";
    }
}
