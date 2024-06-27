<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

/**
 * DateTimeTimeZoneType
 */
class DateTimeTimeZoneType extends DateTimeType
{
    protected string $serverFormat = 'Y-m-d H:i:s.uP';
}
