<?php

namespace App;

class RemoteDomain
{
    public $providerName;
    public $providerId;
    public $domain;
    public $expires;
    public $renewAuto;
    public $renewable;
    public $status;
    
    public function __construct(string $providerName, string $providerId, $domain, $expires, $renewAuto, $renewable, $status)
    {
        $this->providerName = $providerName;
        $this->providerId = $providerId;
        $this->domain = $domain;
        $this->expires = $expires;
        $this->renewAuto = $renewAuto;
        $this->renewable = $renewable;
        $this->status = $status;
    }
}
