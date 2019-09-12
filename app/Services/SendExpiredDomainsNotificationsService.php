<?php

namespace App\Services;

use App\Mail\DomainExpired;
use App\Enums\RemoteDomainsProviders;
use App\Contracts\RemoteDomainsRepositoryContract as RemoteDomainsRepository;
use App\HostedDomain;
use Illuminate\Support\Facades\Mail;
use Log;

class SendExpiredDomainsNotificationsService
{
    public function __construct(RemoteDomainsRepository $domainHost)
    {
        $this->domainHost = $domainHost;
    }
    
    public function call()
    {
        $remoteDomains = $this->domainHost->getExpiredDaysBeforeToday(1);
        
        if (empty($remoteDomains)) 
        {
            Log::info("No domains found to have expired yesterday.");
        }
        
        foreach($remoteDomains as $remoteDomain) {
            Log::info("{$remoteDomain->domain} found to have expired yesterday. Sending Notification");
            
            $hostedDomain = HostedDomain::with('client.accountManager')->where([
                ['remote_provider_type', RemoteDomainsProviders::getValue($remoteDomain->providerName)],
                ['remote_provider_id', $remoteDomain->providerId]
            ])->first();

            if (!empty($hostedDomain))
            {
                $accountManager = $hostedDomain->client->accountManager;

                if (!empty($accountManager))
                {
                    Mail::to($accountManager)->send(new DomainExpired($remoteDomain, $hostedDomain));
                }
                else
                {
                    Log::warning("No Account Manager found for { $remoteDomain->domain }. Domain expiration notification not sent to account manager.");
                }
            } 
            else 
            {
                Log::warning("No HostedDomain found for { $remoteDomain->providerId }: { $remoteDomain->domain }. Domain expiration notification not sent to account manager.");
            }
        }
    }
}
