<?php

namespace App;
use Carbon\Carbon;

class RemoteDomain
{
    public $providerName;
    public $providerId;
    public $domain;
    public $expires;
    public $renewAuto;
    public $renewable;
    public $status;
    
    public function __construct(string $providerName, string $providerId, string $domain, string $expires, bool $renewAuto, bool $renewable, string $status)
    {
        $this->providerName = $providerName;
        $this->providerId = $providerId;
        $this->domain = $domain;
        $this->rawExpires = $expires;
        $this->expires = Carbon::parse($expires)->setTimezone('UTC');
        $this->renewAuto = $renewAuto;
        $this->renewable = $renewable;
        $this->status = $status;
    }
    
    /**
     * @return boolean
     */
    public function willAutoRenew()
    {
        return $this->renewAuto && $this->renewable;
    }
}
