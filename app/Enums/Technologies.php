<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Technologies extends Enum
{
    const WordPress = 0;
    const RubyOnRails = 1;
    const Laravel = 2;
    const MindFire = 3;
    const HTML = 4;
    const Drupal = 5;
    const PHP = 6;

    public static function getDescription($value): string {
	    switch ($value) {
	        case self::WordPress:
	            return 'WordPress';
	        break;
	        case self::RubyOnRails:
	            return 'Ruby on Rails';
	        break;
	        case self::MindFire:
	            return 'MindFire';
	        break;
	        case self::HTML:
	            return 'HTML';
	        break;
	        case self::PHP:
	            return 'PHP';
	        break;
	        default:
	            return self::getKey($value);
	    }
	}
}
