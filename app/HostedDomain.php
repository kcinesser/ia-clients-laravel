<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostedDomain extends Model
{
    protected $guarded = [];
    protected $table = 'hosted_domains';
    protected $casts = [
        'remote_provider_type' => 'integer',
        'remote_provider_id' => 'integer',
    ];

    public function site() {
    	return $this->belongsTo(Site::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function registrar() {
        return $this->belongsTo(Registrar::class);
    }

    public function domain_account() {
        return $this->belongsTo(DomainAccount::class);
    }

    public function path() {
    	return "/clients/{$this->client->id}/domains/{$this->id}";
    }
}
