<?php

namespace App\Console\Commands;

use App\Services\GetRemoteDomainsService;
use App\Libraries\GoDaddy\GoDaddyClient;
use App\Libraries\Namecheap\NamecheapClient;
use Illuminate\Console\Command;
use Carbon\Carbon;
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

        // Get all domains that expire in 1 month from today
//         $godaddy = resolve(GoDaddyClient::class);
//         $domains = $godaddy->get('/v1/domains', ['statusGroupsOnly' => 'RENEWABLE', 'statuses' => 'ACTIVE']);
        
        $domains = $this->getAllDomains();
        
        $thirtyDaysExpiringDomains = $this->getExpiringDomains(30, $domains);
        $tenDaysExpiringDomains = $this->getExpiringDomains(10, $domains);
        $renewedYesterdayDomains = $this->getRenewedYesterdayDomains($domains);
        
        Log::info('30 days:');
        Log::info($thirtyDaysExpiringDomains);
        Log::info('10 days:');
        Log::info($tenDaysExpiringDomains);
        Log::info('Renewed Yesterday:');
        Log::info($renewedYesterdayDomains);
        
        // For each domain {
        //   if the domain belongs to a site under the MMA, send an email to AM saying that it will be taken care of at no charge
        //   if the domain belongs to a site NOT under the MMA, send an email to AM saying that it will be renewing and an invoice will need to be generated
        // }
        Log::info('sendDomainRenewalNotices Command run successfully.');
    }
    
    private function getAllDomains()
    {
        $godaddyDomainsService = new GetRemoteDomainsService(resolve(GoDaddyClient::class));
        return $godaddyDomainsService->call();
//         $namecheapDomainsService = new GetRemoteDomainsService(resolve(NamecheapClient::class));
//         return $namecheapDomainsService->call();
    }
    
    private function getExpiringDomains($daysOut, $domains) 
    {
        return array_filter($domains, function($domain) use ($daysOut) {
            $domainExpiration = Carbon::parse($domain->expires)->setTimezone('UTC');
            $daysOutStart = Carbon::now()->startOfDay()->addDays($daysOut);
            $daysOutEnd = $daysOutStart->copy()->endOfDay();
            
            if ($domainExpiration->isBetween($daysOutStart, $daysOutEnd)) {
                return true;
            }
            
            return false;
        });
    }
    
    private function getRenewedYesterdayDomains($domains)
    {
        return array_filter($domains, function($domain) {
            $domainExpiration = Carbon::parse($domain->expires)->setTimezone('UTC');
            $daysOutStart = Carbon::now()->startOfDay()->subDays(1)->addYear(1);
            $daysOutEnd = $daysOutStart->copy()->endOfDay();
            
            if ($domainExpiration->isBetween($daysOutStart, $daysOutEnd)) {
                return true;
            }
            
            return false;
        });
    }
}
