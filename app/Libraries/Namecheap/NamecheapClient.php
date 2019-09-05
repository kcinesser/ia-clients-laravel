<?php

namespace App\Libraries\Namecheap;

use App\Contracts\RemoteDomainsClient as RemoteDomainsClient;
use App\RemoteDomain;
use function GuzzleHttp\json_decode;
use Log;

/**
 * Class FdpApiClient
 *
 * @package App\Libraries\GuzzleHttp
 */
class NamecheapClient implements RemoteDomainsClient
{    
    /**
     * @return RemoteDomain[]
     */
    public function getDomains()
    {
        $domains = json_decode('[
            {
                "createdAt": "2004-09-03T13:16:27.000Z",
                "domain": "jeffsdomain.com",
                "domainId": 191284878,
                "expirationProtected": false,
                "expires": "2020-09-04T13:16:27.000Z",
                "holdRegistrar": false,
                "locked": true,
                "nameServers": null,
                "privacy": false,
                "renewAuto": true,
                "renewDeadline": "2020-10-18T13:16:27.000Z",
                "renewable": true,
                "status": "ACTIVE",
                "transferProtected": false
            },
            {
                "createdAt": "2002-08-28T20:03:08.000Z",
                "domain": "jeffsdomain.org",
                "domainId": 207946753,
                "expirationProtected": false,
                "expires": "2020-08-28T20:03:08.000Z",
                "holdRegistrar": false,
                "locked": true,
                "nameServers": null,
                "privacy": false,
                "renewAuto": true,
                "renewDeadline": "2020-10-12T20:03:08.000Z",
                "renewable": true,
                "status": "ACTIVE",
                "transferProtected": false
            }]', TRUE);
        
        return array_map(function($remoteDomain){
            // should probably use resolve(RemoteDomain::class, [...]) here instead of new RemoteDomain(...)
            return new RemoteDomain('NameCheap', $remoteDomain['domainId'], $remoteDomain['domain'], $remoteDomain['expires'], $remoteDomain['renewAuto'], $remoteDomain['renewable'], $remoteDomain['status']);
        }, $domains);
    }

}