<?php

namespace App\Console\Commands;

use App\Services\SendThirtyDayRenewingDomainsNotificationsService;
use App\Services\SendThirtyDayExpiringDomainsNotificationsService;
use App\Services\GoDaddyDomainsService;
use App\Services\NamecheapDomainsService;
use App\Repositories\RemoteDomainsRepository;
use App\Libraries\GoDaddy\GoDaddyClient;
use App\Libraries\Namecheap\NamecheapClient;
use Illuminate\Console\Command;
use Log;

class sendDomainRenewalNotices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendDomainRenewalNotices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a notice to AMs alerting them about upcoming or processed domain renewals.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('Running sendDomainRenewalNotices command.');
        
        //         $goDaddyRepository = resolve(RemoteDomainsRepository::class, ['client' => resolve(GoDaddyDomainsService::class)]);
        //         resolve(
        //             SendThirtyDayRenewingDomainsNotificationsService::class, ['domainHost' => $goDaddyRepository]
        //         )->call();
            
        $namecheapRepository = resolve(RemoteDomainsRepository::class, ['client' => resolve(NamecheapDomainsService::class)]);
        
        // Send thirty day renewal notices
        resolve(
            SendThirtyDayRenewingDomainsNotificationsService::class, ['domainHost' => $namecheapRepository]
        )->call();
        
        // Send thirty day expiration notices
        resolve(
            SendThirtyDayExpiringDomainsNotificationsService::class, ['domainHost' => $namecheapRepository]
        )->call();
        
        Log::info('sendDomainRenewalNotices Command run successfully.');
    }
}
