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
    
//     /**
//      * @return array
//      */
//     public function getExpiringInTenDays()
//     {
//         return $this->getExpiring(10);
//     }
    
//     /**
//      * @return array
//      */
//     public function getExpiringInThirtyDays()
//     {
//         return $this->getExpiring(30);
//     }
    
//     /**
//      * @return array
//      */
//     public function getRenewingInTenDays()
//     {
//         return $this->getRenewing(10);
//     }
    
//     /**
//      * @return array
//      */
//     public function getRenewingInThirtyDays()
//     {
//         return $this->getRenewing(30);
//     }
    
//     /**
//      * @return array
//      */
//     public function getExpiredYesterday()
//     {
//         return $this->getExpiring(-1);
//     }
    
//     /**
//      * @return array
//      */
//     public function getRenewedYesterday()
//     {
//         return $this->getRenewing(-1);
//     }
    
    private function filterByDaysOut($domains, int $daysOut)
    {
        return array_filter($domains, function($domain) use ($daysOut) {
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