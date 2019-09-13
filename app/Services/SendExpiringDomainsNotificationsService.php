<?php

namespace App\Services;

use App\Notifications\UpcomingDomainExpiration;
use App\Notifications\MissingAccountManagerForDomain;
use App\Notifications\MissingRecordForDomain;
use App\Enums\RemoteDomainsProviders;
use App\Contracts\RemoteDomainsRepositoryContract as RemoteDomainsRepository;
use App\HostedDomain;
use Illuminate\Support\Facades\Notification;
use Log;

class SendExpiringDomainsNotificationsService
{
    public function __construct(RemoteDomainsRepository $domainHost, int $daysOut)
    {
        $this->domainHost = $domainHost;
        $this->daysOut = $daysOut;
    }
    
    public function call()
    {
        $remoteDomains = $this->domainHost->getExpiringDaysFromToday($this->daysOut);
        
        if (empty($remoteDomains)) 
        {
            Log::info("No domains found to be expiring in {$this->daysOut} days.");
        }
        
        foreach($remoteDomains as $remoteDomain) {
            Log::info("{$remoteDomain->domain} is expiring in {$this->daysOut} days. Sending Notification");
            
            $hostedDomain = HostedDomain::with('client.accountManager')->where([
                ['remote_provider_type', RemoteDomainsProviders::getValue($remoteDomain->providerName)],
                ['remote_provider_id', $remoteDomain->providerId]
            ])->first();

            if (!empty($hostedDomain))
            {
                $accountManager = $hostedDomain->client->accountManager;

                if (!empty($accountManager))
                {
                    Notification::route('slack', config('services.slack.webhook.url'))
                                ->route('mail', $accountManager)
                                ->notify(new UpcomingDomainExpiration($remoteDomain, $hostedDomain, $this->daysOut));
                }
                else
                {
                    Log::warning("No Account Manager found for { $remoteDomain->domain }. Upcoming domain expiration notification not sent to account manager.");
                    Notification::route('slack', config('services.slack.webhook.url'))
                                ->notify(new MissingAccountManagerForDomain($remoteDomain));
                }
            } 
            else 
            {
                Log::warning("No HostedDomain found for { $remoteDomain->providerId }: { $remoteDomain->domain }. Upcoming domain expiration notification not sent to account manager.");
                Notification::route('slack', config('services.slack.webhook.url'))
                            ->notify(new MissingRecordForDomain($remoteDomain));
            }
        }
    }
}
