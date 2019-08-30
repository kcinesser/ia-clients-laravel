<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $guarded = [];

    public function site() {
    	return $this->belongsTo(Site::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function path() {
    	return "/clients/{$this->client->id}/domains/{$this->id}";
    }
}
