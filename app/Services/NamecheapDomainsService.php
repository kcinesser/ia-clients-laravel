<?php

namespace App\Services;

use App\RemoteDomain;
use App\Contracts\RemoteDomainsClientContract as RemoteDomainsClientContract;
use App\Libraries\Namecheap\NamecheapClient;
use Log;

class namecheapDomainsService implements RemoteDomainsClientContract
{
    private $client;
    
    public function __construct(NamecheapClient $client)
    {
        $this->client = $client;
    }
    
    /**
     * @return RemoteDomain[]
     */
    public function getDomains()
    {
        $domains = $this->client->getFakeDomains();
        
        return array_map(function($remoteDomain){
            return resolve(
                RemoteDomain::class,
                [
                    'providerName' => 'Namecheap', 
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