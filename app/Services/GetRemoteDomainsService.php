<?php

namespace App\Services;

use App\Libraries\GoDaddy\GoDaddyClient;
use Log;

class getRemoteDomainsService
{
    public function __construct(GoDaddyClient $client)
    {
        $this->client = $client;
    }
    
    public function call()
    {
        return $this->client->get('/v1/domains', ['statusGroupsOnly' => 'RENEWABLE', 'statuses' => 'ACTIVE']);
    }
}
