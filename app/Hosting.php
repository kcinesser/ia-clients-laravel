<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hosting extends Model
{
    public $guarded = [];
    protected $table = 'hosting';

    public function sites(){
        return $this->hasMany(Site::class, 'host_id');
    }
}
