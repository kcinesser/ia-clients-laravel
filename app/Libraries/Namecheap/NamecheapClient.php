<?php

namespace App\Libraries\Namecheap;

use function GuzzleHttp\json_decode;
use Log;

/**
 * Class FdpApiClient
 *
 * @package App\Libraries\GuzzleHttp
 */
class NamecheapClient
{    
    /**
     * @return RemoteDomain[]
     */
    public function getFakeDomains()
    {       
        return json_decode('[
            {
                "createdAt": "2004-09-03T13:16:27.000Z",
                "domain": "jeffsdomain.com",
                "domainId": 191284878,
                "expirationProtected": false,
                "expires": "2019-10-11T13:16:27.000Z",
                "holdRegistrar": false,
                "locked": true,
                "nameServers": null,
                "privacy": false,
                "renewAuto": false,
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
                "expires": "2019-09-21T20:03:08.000Z",
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
    }

}