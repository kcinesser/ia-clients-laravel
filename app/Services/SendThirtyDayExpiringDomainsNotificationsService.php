<?php

namespace App\Services;

use App\Mail\UpcomingDomainExpiration;
use App\Enums\RemoteDomainsProviders;
use App\Contracts\RemoteDomainsRepositoryContract as RemoteDomainsRepository;
use App\HostedDomain;
use Illuminate\Support\Facades\Mail;
use Log;

class sendThirtyDayExpiringDomainsNotificationsService
{
    public function __construct(RemoteDomainsRepository $domainHost)
    {
        $this->domainHost = $domainHost;
    }
    
    public function call()
    {
        $remoteDomains = $this->domainHost->getExpiringInThirtyDays();
        
        if (empty($remoteDomains)) 
        {
            Log::info("No domains found to be expiring in 30 days.");
        }
        
        foreach($remoteDomains as $remoteDomain) {
            Log::info("{$remoteDomain->domain} is expiring in 30 days. Sending Notification");
            
            $hostedDomain = HostedDomain::with('client.accountManager')->where([
                ['remote_provider_type', RemoteDomainsProviders::Namecheap],
                ['remote_provider_id', $remoteDomain->providerId]
            ])->first();

            if (!empty($hostedDomain))
            {
                $accountManager = $hostedDomain->client->accountManager;

                if (!empty($accountManager))
                {
                    Mail::to($accountManager)->send(new UpcomingDomainExpiration($remoteDomain, $hostedDomain, 30));
                }
                else
                {
                    Log::warning("No Account Manager found for { $remote->domain }. Upcoming domain expiration notification not sent to account manager.");
                }
            } 
            else 
            {
                Log::warning("No HostedDomain found for { $remoteDomain->providerId }: { $remote->domain }. Upcoming domain expiration notification not sent to account manager.");
            }
        }
    }
}
