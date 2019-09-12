<?php

namespace App\Services;

use App\Mail\UpcomingDomainRenewal;
use App\Enums\RemoteDomainsProviders;
use App\Contracts\RemoteDomainsRepositoryContract as RemoteDomainsRepository;
use App\HostedDomain;
use Illuminate\Support\Facades\Mail;
use Log;

class SendRenewingDomainsNotificationsService
{
    public function __construct(RemoteDomainsRepository $domainHost, int $daysOut)
    {
        $this->domainHost = $domainHost;
        $this->daysOut = $daysOut;
    }
    
    public function call()
    {
        $remoteDomains = $this->domainHost->getRenewingDaysFromToday($this->daysOut);
        
        if (empty($remoteDomains)) 
        {
            Log::info("No domains found to be renewing in {$this->daysOut} days.");
        }
        
        foreach($remoteDomains as $remoteDomain) {
            Log::info("{$remoteDomain->domain} is renewing in {$this->daysOut} days. Sending Notification");
            
            $hostedDomain = HostedDomain::with('client.accountManager')->where([
                ['remote_provider_type', RemoteDomainsProviders::getValue($remoteDomain->providerName)],
                ['remote_provider_id', $remoteDomain->providerId]
            ])->first();

            if (!empty($hostedDomain))
            {
                $accountManager = $hostedDomain->client->accountManager;

                if (!empty($accountManager))
                {
                    Mail::to($accountManager)->send(new UpcomingDomainRenewal($remoteDomain, $hostedDomain, $this->daysOut));
                }
                else
                {
                    Log::warning("No Account Manager found for { $remoteDomain->domain }. Upcoming domain renewal notification not sent to account manager.");
                }
            } 
            else 
            {
                Log::warning("No HostedDomain found for { $remoteDomain->providerId }: { $remoteDomain->domain }. Upcoming domain renewal notification not sent to account manager.");
            }
        }
    }
}
