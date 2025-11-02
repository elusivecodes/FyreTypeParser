<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

use Override;

use function filter_var;

use const FILTER_NULL_ON_FAILURE;
use const FILTER_VALIDATE_BOOLEAN;

/**
 * BooleanType
 */
class BooleanType extends Type
{
    /**
     * Parse a user value to PHP value.
     *
     * @param mixed $value The user value.
     * @return bool|null The PHP value.
     */
    #[Override]
    public function parse(mixed $value): bool|null
    {
        if ($value === null || $value === '') {
            return null;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}
