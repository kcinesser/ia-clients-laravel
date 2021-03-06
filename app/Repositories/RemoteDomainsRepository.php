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
    public function getExpiringDaysFromToday(int $daysOut)
    {
        return $this->getExpiring($daysOut);
    }
    
    /**
     * @return array
     */
    public function getRenewingDaysFromToday(int $daysOut)
    {
        return $this->getRenewing($daysOut);
    }
    
    /**
     * @return array
     */
    public function getExpiredDaysBeforeToday(int $daysBefore)
    {
        return $this->getExpiring($this->ensureNegative($daysBefore));
    }
    
    /**
     * If a domain renewed yesterday, the date expired will be yesterday's date of next year.
     * This method will return all domains that have auto-renew enabled and an expiration
     * date of Yesterday + 1 year.
     * 
     * @return array
     */
    public function getRenewedYesterday()
    {
        // do this to factor in leap year
        $today = Carbon::now();
        $nextYearYesterday = $today->copy()->subDay()->addYear();
        $daysOut = $today->diffInDays($nextYearYesterday);
        
        return $this->getRenewing($daysOut);
    }
    
    /**
     * Takes any integer and returns it as a negative number.
     * Negative arguments return negative. Positive arguments return negative.
     *
     * @return integer
     */
    private function ensureNegative(int $number)
    {
        return (-1 * abs($number));
    }
    
    private function filterByDaysOut($domains, int $daysOut)
    {
        return array_filter($domains, function($domain) use ($daysOut) {
            $daysOutStart = Carbon::now()->startOfDay();
            
            $daysOutStart->addDays($daysOut);
            $daysOutEnd = $daysOutStart->copy()->endOfDay();
            
            if ($domain->expires->isBetween($daysOutStart, $daysOutEnd)) {
                return true;
            }
            
            return false;
        });
    }
    
    private function getRenewing(int $daysOutFilter = NULL)
    {
        $renewing = array_filter($this->all(), function($domain) {
            return $domain->willAutoRenew();
        });
            
        if (is_int($daysOutFilter))
        {
            return $this->filterByDaysOut($renewing, $daysOutFilter);
        }
        else
        {
            return $renewing;
        }
    }
    
    private function getExpiring(int $daysOutFilter = NULL)
    {
        $expiring = array_filter($this->all(), function($domain) {
            return !$domain->willAutoRenew();
        });
            
        if (is_int($daysOutFilter))
        {
            return $this->filterByDaysOut($expiring, $daysOutFilter);
        }
        else
        {
            return $expiring;
        }
    }
}