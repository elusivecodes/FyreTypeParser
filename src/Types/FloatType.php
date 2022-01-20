<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

use const
    FILTER_NULL_ON_FAILURE,
    FILTER_VALIDATE_FLOAT;

use function
    filter_var;

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
    public function parse($value): float|null
    {
        if ($value === null) {
            return null;
        }

        return filter_var($value, FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE);
    }

}
