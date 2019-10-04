<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use Log;

final class ClientStatus extends Enum
{
    const Incoming = 0;
    const Active = 1;
    const Archived = 3;
    
    public static function getDescription($value): string {
        switch ($value) {
            default:
                return self::getKey($value);
        }
    }
}
