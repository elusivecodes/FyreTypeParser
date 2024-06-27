<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

/**
 * DateTimeFractionalType
 */
class DateTimeFractionalType extends DateTimeType
{
    protected string $serverFormat = 'Y-m-d H:i:s.u';
}
