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
	public function getExpiringInTenDays();
	
	/**
	 * @return array
	 */
	public function getExpiringInThirtyDays();
	
	/**
	 * @return array
	 */
	public function getRenewingInTenDays();
	
	/**
	 * @return array
	 */
	public function getRenewingInThirtyDays();
	
	/**
	 * @return array
	 */
	public function getExpiredYesterday();
	
	/**
	 * @return array
	 */
	public function getRenewedYesterday();
	
}