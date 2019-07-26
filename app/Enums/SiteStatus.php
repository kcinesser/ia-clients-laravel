<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class SiteStatus extends Enum
{
    const Live = 0;
    const UnderConstruction = 1;
    const Inactive = 2;
    const Archived = 3;

    public static function getDescription($value): string {
      switch ($value) {
	        case self::UnderConstruction:
	            return 'Under Construction';
	        break;
	      
	        default:
	            return self::getKey($value);
	    }
	}
}
