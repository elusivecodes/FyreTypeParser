<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

use const FILTER_NULL_ON_FAILURE;
use const FILTER_VALIDATE_INT;

use function filter_var;

/**
 * IntegerType
 */
class IntegerType extends Type
{

    /**
     * Parse a user value to PHP value.
     * @param mixed $value The user value.
     * @return int|null The PHP value.
     */
    public function parse(mixed $value): int|null
    {
        if ($value === null) {
            return null;
        }

        return filter_var($value, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
    }

}
