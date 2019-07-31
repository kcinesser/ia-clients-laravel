<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public function priceFormat() {
    	return number_format($this->price, 2, '.', ',');
    }

    public function sites() {
    	return $this->belongsToMany(Site::class);
    }
}
