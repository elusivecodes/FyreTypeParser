<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

/**
 * TimeType
 */
class TimeType extends DateTimeType
{
    protected array $formats = [
        'H:i',
        'H:i:s',
        'H:i:sP',
        'H:i:s.u',
        'H:i:s.uP',
    ];

    protected string $serverFormat = 'H:i:s';

    protected string|null $serverTimeZone = 'UTC';
}
