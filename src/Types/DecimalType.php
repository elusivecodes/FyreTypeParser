<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

use function is_numeric;

/**
 * DecimalType
 */
class DecimalType extends Type
{
    /**
     * Parse a user value to PHP value.
     * @param mixed $value The user value.
     * @return string|null The PHP value.
     */
    public function parse(mixed $value): string|null
    {
        if ($value === null || !is_numeric($value)) {
            return null;
        }

        return (string) $value;
    }
}
