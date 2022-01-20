<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

/**
 * TimeType
 */
class TimeType extends DateTimeType
{

    protected string $serverFormat = 'H:i:s';

    protected array $formats = [
        'H:i',
        'H:i:s'
    ];

}
