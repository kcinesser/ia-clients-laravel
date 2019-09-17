<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostedDomain extends Model
{
    protected $guarded = [];
    protected $table = 'hosted_domains';
    protected $casts = [
        'remote_provider_type' => 'integer',
        'remote_provider_id' => 'integer'
    ];
    
    /**
     * Set the domain free_with_mma to a boolean true when set to "on", false for any other string.
     * Form checkboxes pass data to request as "on".
     *
     * @param  string  $value
     * @return void
     */
    public function setFreeWithMmaAttribute($value)
    {
        if (is_bool($value))
        {
            $this->attributes['free_with_mma'] = $value;
        } else {
            $this->attributes['free_with_mma'] = ($value == 'on');
        }
    }

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
