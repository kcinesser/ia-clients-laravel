<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserTypes extends Enum
{
    const Developer = 0;
    const AccountManager = 1;

    public static function getDescription($value): string {
	    switch ($value) {
	        case self::AccountManager:
	            return 'Account Manager';
	        break;
	        default:
	            return self::getKey($value);
	    }
	}
}
