<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ClientStatus extends Enum
{
    const Incoming = 0;
    const Active = 1;
    const Archived = 3;
}
