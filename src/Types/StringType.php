<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

use Override;
use Stringable;

use function is_scalar;

/**
 * StringType
 */
class StringType extends Type
{
    /**
     * Parse a user value to PHP value.
     *
     * @param mixed $value The user value.
     * @return string|null The PHP value.
     */
    #[Override]
    public function parse(mixed $value): string|null
    {
        if ($value === null || (!is_scalar($value) && !($value instanceof Stringable))) {
            return null;
        }

        return (string) $value;
    }
}
