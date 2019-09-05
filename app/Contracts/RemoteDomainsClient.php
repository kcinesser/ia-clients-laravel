<?php
namespace App\Contracts;
/**
 * Interface RemoteDomainsClient
 */
interface RemoteDomainsClient
{
	/**
	 * @return array
	 */
	public function getDomains();
	
}