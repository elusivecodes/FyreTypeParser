<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

use Fyre\DateTime\DateTime;

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

    /**
     * Parse a database value to PHP value.
     *
     * @param mixed $value The database value.
     * @return DateTime|null The PHP value.
     */
    public function fromDatabase(mixed $value): DateTime|null
    {
        $date = parent::fromDatabase($value);

        return $date ? $date->startOfDay() : null;
    }

    /**
     * Parse a user value to PHP value.
     *
     * @param mixed $value The user value.
     * @return DateTime|null The PHP value.
     */
    public function parse(mixed $value): DateTime|null
    {
        $date = parent::parse($value);

        return $date ? $date->startOfDay() : null;
    }
}
