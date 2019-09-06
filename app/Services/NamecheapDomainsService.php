<?php

namespace App\Services;

use App\RemoteDomain;
use App\Contracts\RemoteDomainsClientContract as RemoteDomainsClientContract;
use App\Libraries\Namecheap\NamecheapClient;
use Log;

class namecheapDomainsService implements RemoteDomainsClientContract
{
    private $client;
    
    public function __construct(namecheapClient $client)
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
            // should probably use resolve(RemoteDomain::class, [...]) here instead of new RemoteDomain(...)
            return new RemoteDomain('Namecheap', $remoteDomain['domainId'], $remoteDomain['domain'], $remoteDomain['expires'], $remoteDomain['renewAuto'], $remoteDomain['renewable'], $remoteDomain['status']);
        }, $domains);
    }
}