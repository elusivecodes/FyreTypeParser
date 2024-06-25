<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

/**
 * DateType
 */
class DateType extends DateTimeType
{
    protected array $formats = [
        'Y-m-d',
    ];

    protected string $serverFormat = 'Y-m-d';

    protected string|null $serverTimeZone = 'UTC';

    protected bool $startOfDay = true;
}
