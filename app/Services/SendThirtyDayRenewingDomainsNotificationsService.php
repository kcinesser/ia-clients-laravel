<?php

namespace App\Services;

use App\Contracts\RemoteDomainsRepositoryContract as RemoteDomainsRepository;
use Log;

class sendThirtyDayRenewingDomainsNotificationsService
{
    public function __construct(RemoteDomainsRepository $domainHost)
    {
        $this->domainHost = $domainHost;
    }
    
    public function call()
    {
        $domains = $this->domainHost->getRenewingInThirtyDays();
        
        Log::info('30 days:');
        Log::info($domains);
    }
}
