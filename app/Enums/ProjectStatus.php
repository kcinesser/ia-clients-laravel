<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ProjectStatus extends Enum
{
    const Incoming = 0;
    const Hold = 1;
    const Kickoff = 2;
    const InDesign = 3;
    const Dev = 4;
    const Complete = 5;
    const Archived = 6;

    public static function getDescription($value): string {
        switch ($value) {
              case self::InDesign:
                    return 'In Design';
              break;

              case self::Dev:
                    return 'Development';
            
              default:
                    return self::getKey($value);
          }
      }
}
