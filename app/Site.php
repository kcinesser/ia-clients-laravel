<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = [];

    public function path() {
        return "{$this->client->path()}/sites/{$this->id}";
    }

    public function client() {
    	return $this->belongsTo(Client::class);
    }
}
