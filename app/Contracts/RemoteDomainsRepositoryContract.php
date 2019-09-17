<?php
namespace App\Contracts;
/**
 * Interface RemoteDomainsRepositoryContract
 */
interface RemoteDomainsRepositoryContract
{
	/**
	 * @return array
	 */
	public function all();
	
	/**
     * @return array
     */
    public function getExpiringDaysFromToday(int $daysOut);
    
    /**
     * @return array
     */
    public function getRenewingDaysFromToday(int $daysOut);
    
    /**
     * @return array
     */
    public function getExpiredDaysBeforeToday(int $daysBefore);
    
    /**
     * @return array
     */
    public function getRenewedYesterday();
	
}