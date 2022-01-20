<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

/**
 * DateType
 */
class DateType extends DateTimeType
{

    protected string $serverFormat = 'Y-m-d';

    protected array $formats = [
        'Y-m-d'
    ];

    protected bool $startOfDay = true;

}
