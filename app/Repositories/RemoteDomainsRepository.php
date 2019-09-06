<?php 

namespace App\Repositories;

use App\Contracts\RemoteDomainsRepositoryContract as RemoteDomainsRepositoryContract;
use App\Contracts\RemoteDomainsClientContract as RemoteDomainsClient;
use Carbon\Carbon;
use Log;

class RemoteDomainsRepository implements RemoteDomainsRepositoryContract
{
    /**
     * @var RemoteDomainsClient
     */
    protected $client;

    /**
     * @return array
     */
    public function __construct(RemoteDomainsClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->client->getDomains();
    }
    
    /**
     * @return array
     */
    public function getExpiringInTenDays()
    {
        return $this->filterByDaysOut($this->getExpiring(), 10);
    }
    
    /**
     * @return array
     */
    public function getExpiringInThirtyDays()
    {
        return $this->filterByDaysOut($this->getExpiring(), 30);
    }
    
    /**
     * @return array
     */
    public function getRenewingInTenDays()
    {
        return $this->filterByDaysOut($this->getRenewing(), 10);
    }
    
    /**
     * @return array
     */
    public function getRenewingInThirtyDays()
    {
        return $this->filterByDaysOut($this->getRenewing(), 30);
    }
    
    /**
     * @return array
     */
    public function getExpiredYesterday()
    {
        return $this->filterByDaysOut($this->getExpiring(), -1);
    }
    
    /**
     * @return array
     */
    public function getRenewedYesterday()
    {
        return $this->filterByDaysOut($this->getRenewing(), -1);
    }
    
    private function filterByDaysOut($domains, int $daysOut)
    {
        return array_filter($domains, function($domain) use ($daysOut) {
            $domainExpiration = Carbon::parse($domain->expires)->setTimezone('UTC');
            $daysOutStart = Carbon::now()->startOfDay();
            
            if ($daysOut < 0)
            {
                $daysOutStart->subDays($daysOut);
            }
            else
            {
                $daysOutStart->addDays($daysOut);
            }
            
            $daysOutEnd = $daysOutStart->copy()->endOfDay();
            
            if ($domainExpiration->isBetween($daysOutStart, $daysOutEnd)) {
                return true;
            }
            
            return false;
        });
    }
    
    private function getRenewing()
    {
        return array_filter($this->all(), function($domain) {
            return $domain->willAutoRenew();
        });
    }
    
    private function getExpiring()
    {
        return array_filter($this->all(), function($domain) {
            return !$domain->willAutoRenew();
        });
    }
}