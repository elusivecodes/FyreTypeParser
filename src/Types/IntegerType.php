<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

use Override;

use function filter_var;

use const FILTER_NULL_ON_FAILURE;
use const FILTER_VALIDATE_INT;

/**
 * IntegerType
 */
class IntegerType extends Type
{
    /**
     * Parse a user value to PHP value.
     *
     * @param mixed $value The user value.
     * @return int|null The PHP value.
     */
    #[Override]
    public function parse(mixed $value): int|null
    {
        if ($value === null) {
            return null;
        }

        return filter_var($value, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
    }
}
