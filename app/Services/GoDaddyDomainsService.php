<?php

namespace App\Services;

use App\RemoteDomain;
use App\Contracts\RemoteDomainsClientContract as RemoteDomainsClientContract;
use App\Libraries\GoDaddy\GoDaddyClient;
use Log;

class GoDaddyDomainsService implements RemoteDomainsClientContract
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
            return resolve(
                RemoteDomain::class,
                [
                    'providerName' => 'GoDaddy',
                    'providerId' => $remoteDomain['domainId'],
                    'domain' => $remoteDomain['domain'],
                    'expires' => $remoteDomain['expires'],
                    'renewAuto' => $remoteDomain['renewAuto'],
                    'renewable' => $remoteDomain['renewable'],
                    'status' => $remoteDomain['status']
                ]
            );
        }, $domains);
    }
}