<?php

namespace App\Console\Commands;

use App\Services\SendRenewingDomainsNotificationsService;
use App\Services\SendExpiringDomainsNotificationsService;
use App\Services\SendRenewedDomainsNotificationsService;
use App\Services\SendExpiredDomainsNotificationsService;
use App\Services\GoDaddyDomainsService;
use App\Repositories\RemoteDomainsRepository;
use App\Libraries\GoDaddy\GoDaddyClient;
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
            
        $repository = resolve(RemoteDomainsRepository::class, ['client' => resolve(GoDaddyDomainsService::class)]);
        
        // Send thirty day upcoming renewal notices
        resolve(
            SendRenewingDomainsNotificationsService::class, 
            ['domainHost' => $repository, 'daysOut' => 30]
        )->call();
        
        // Send thirty day upcoming expiration notices
        resolve(
            SendExpiringDomainsNotificationsService::class, 
            ['domainHost' => $repository, 'daysOut' => 30]
        )->call();
        
        // Send ten day upcoming renewal notices
        resolve(
            SendRenewingDomainsNotificationsService::class, 
            ['domainHost' => $repository, 'daysOut' => 10]
        )->call();
        
        // Send ten day upcoming expiration notices
        resolve(
            SendExpiringDomainsNotificationsService::class, 
            ['domainHost' => $repository, 'daysOut' => 10]
        )->call();
        
        // Send yesterdays expiration notices
        resolve(
            SendExpiredDomainsNotificationsService::class, 
            ['domainHost' => $repository]
        )->call();
        
        // Send yesterdays renewal notices
        resolve(
            SendRenewedDomainsNotificationsService::class,
            ['domainHost' => $repository]
        )->call();
        
        Log::info('sendDomainRenewalNotices Command run successfully.');
    }
}
