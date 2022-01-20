<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

use const
    FILTER_NULL_ON_FAILURE,
    FILTER_VALIDATE_BOOLEAN;

use function
    filter_var;

/**
 * BooleanType
 */
class BooleanType extends Type
{

    /**
     * Parse a user value to PHP value.
     * @param mixed $value The user value.
     * @return bool|null The PHP value.
     */
    public function parse($value): bool|null
    {
        if ($value === null || $value === '') {
            return null;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }

}
