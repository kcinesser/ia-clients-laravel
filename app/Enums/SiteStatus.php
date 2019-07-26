<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class SiteStatus extends Enum
{
    const InDevelopment = 0;
    const Live = 1;
    const Staging = 2;
    const Inactive = 3;
    const Archived = 4;

    public static function getDescription($value): string {
      switch ($value) {
	        case self::InDevelopment:
	            return 'In Development';
	        break;
	      
	        default:
	            return self::getKey($value);
	    }
	}
}
