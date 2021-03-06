<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RemoteDomainsProviders extends Enum
{
    const GoDaddy = 0;
    
    public static function getDescription($value): string {
        switch ($value) {
            default:
                return self::getKey($value);
        }
    }
}