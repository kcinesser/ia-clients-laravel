<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostedDomain extends Model
{
    protected $guarded = [];
    protected $table = 'hosted_domains';

    public function site() {
    	return $this->belongsTo(Site::class);
    }

    public function registrar() {
        return $this->belongsTo(Registrar::class);
    }

    public function domain_account() {
        return $this->belongsTo(DomainAccount::class);
    }

    public function path() {
    	return "/clients/{$this->site->client->id}/sites/{$this->site->id}/domains/{$this->id}";
    }
}
