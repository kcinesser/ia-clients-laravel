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
        $remoteDomains = $this->domainHost->getRenewingInThirtyDays();
        
        foreach($remoteDomains as $remoteDomain) {
            $hostedDomain = HostedDomain::with('client.account_manager')->where('name', $remoteDomain->domain);
            
            // Ship order...
            
            Mail::to($hostedDomain->client()->accountManager())->send($remoteDomain, $hostedDomain);
        }
        Log::info('30 days:');
        Log::info($domains);
    }
}
