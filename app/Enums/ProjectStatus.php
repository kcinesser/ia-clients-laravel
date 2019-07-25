<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ProjectStatus extends Enum
{
    const Incoming = 0;
    const Active = 1;
    const Complete = 2;
    const Archived = 3;
}