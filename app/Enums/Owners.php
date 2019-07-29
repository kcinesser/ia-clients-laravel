<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Owners extends Enum
{
    const Firespring = 0;
    const Client = 1;
    const ThirdParty = 2;

    public static function getDescription($value): string {
    switch ($value) {
        case self::ThirdParty:
            return 'Third Party';
        break;
        default:
            return self::getKey($value);
	    }
	}
}
