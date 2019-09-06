<?php
namespace App\Contracts;
/**
 * Interface RemoteDomainsClientContract
 */
interface RemoteDomainsClientContract
{
	/**
	 * @return array
	 */
	public function getDomains();	
}