<?php

namespace App\Services;

use App\Notifications\DomainRenewed;
use App\Notifications\MissingAccountManagerForDomain;
use App\Notifications\MissingRecordForDomain;
use App\Enums\RemoteDomainsProviders;
use App\Contracts\RemoteDomainsRepositoryContract as RemoteDomainsRepository;
use App\HostedDomain;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use Log;

class SendRenewedDomainsNotificationsService
{
    public function __construct(RemoteDomainsRepository $domainHost)
    {
        $this->domainHost = $domainHost;
    }
    
    public function call()
    {
        $remoteDomains = $this->domainHost->getRenewedYesterday();
        
        if (empty($remoteDomains)) 
        {
            Log::info("No domains found to have renewed yesterday.");
        }
        
        foreach($remoteDomains as $remoteDomain) {
            Log::info("{$remoteDomain->domain} found to have renewed yesterday. Sending Notification");
            
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
                                ->notify(new DomainRenewed($remoteDomain, $hostedDomain));
                }
                else
                {
                    Log::warning("No Account Manager found for { $remoteDomain->domain }. Domain renewal notification not sent to account manager.");
                    Notification::route('slack', config('services.slack.webhook.url'))
                                ->notify(new MissingAccountManagerForDomain($remoteDomain));
                }
            } 
            else 
            {
                Log::warning("No HostedDomain found for { $remoteDomain->providerId }: { $remoteDomain->domain }. Domain renewal notification not sent to account manager.");
                Notification::route('slack', config('services.slack.webhook.url'))
                            ->notify(new MissingRecordForDomain($remoteDomain));
            }
        }
    }
}
