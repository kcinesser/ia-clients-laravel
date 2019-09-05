<?php

namespace App\Services;

use App\Contracts\RemoteDomainsClient as RemoteDomainsClient;
use Log;

class getRemoteDomainsService
{
//     public function __construct(GoDaddyClient $client)
//     {
//         $this->client = $client;
//     }
    
//     public function call()
//     {
//         return $this->client->get('/v1/domains', ['statusGroupsOnly' => 'RENEWABLE', 'statuses' => 'ACTIVE']);
//     }

    public function __construct(RemoteDomainsClient $client)
    {
        $this->client = $client;
    }
    
    public function call()
    {
        return $this->client->getDomains();
    }
}
