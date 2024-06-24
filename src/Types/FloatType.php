<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

use function filter_var;

use const FILTER_NULL_ON_FAILURE;
use const FILTER_VALIDATE_FLOAT;

/**
 * FloatType
 */
class FloatType extends Type
{
    /**
     * Parse a user value to PHP value.
     * @param mixed $value The user value.
     * @return float|null The PHP value.
     */
    public function parse(mixed $value): float|null
    {
        if ($value === null) {
            return null;
        }

        return filter_var($value, FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE);
    }
}
