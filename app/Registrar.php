<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrar extends Model
{
    protected $guarded = [];

    public function path() {
        return "/registrars/{$this->id}";
    }  

    public function domain() {
    	return $this->hasMany(Domain::class);
    }
}