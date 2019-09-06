<?php

namespace App\Services;

use App\RemoteDomain;
use App\Contracts\RemoteDomainsClientContract as RemoteDomainsClientContract;
use App\Libraries\GoDaddy\GoDaddyClient;
use Log;

class goDaddyDomainsService implements RemoteDomainsClientContract
{
    private $client;
    
    public function __construct(GoDaddyClient $client)
    {
        $this->client = $client;
    }
    
    /**
     * @return RemoteDomain[]
     */
    public function getDomains()
    {
        $domains = $this->client->get('/v1/domains', ['statusGroupsOnly' => 'RENEWABLE', 'statuses' => 'ACTIVE']);
        
        return array_map(function($remoteDomain){
            // should probably use resolve(RemoteDomain::class, [...]) here instead of new RemoteDomain(...)
            return new RemoteDomain('GoDaddy', $remoteDomain['domainId'], $remoteDomain['domain'], $remoteDomain['expires'], $remoteDomain['renewAuto'], $remoteDomain['renewable'], $remoteDomain['status']);
        }, $domains);
    }
}