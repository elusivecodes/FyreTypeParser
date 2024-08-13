<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

use Stringable;

use function explode;
use function implode;
use function is_array;
use function is_string;

/**
 * SetType
 */
class SetType extends Type
{
    /**
     * Parse a user value to PHP value.
     *
     * @param mixed $value The user value.
     * @return string|null The PHP value.
     */
    public function parse(mixed $value): array|null
    {
        if (is_array($value)) {
            return $value;
        }

        if (is_string($value) || $value instanceof Stringable) {
            return explode(',', (string) $value);
        }

        return null;
    }

    /**
     * Parse a PHP value to database value.
     *
     * @param mixed $value The PHP value.
     * @return string|null The database value.
     */
    public function toDatabase(mixed $value): string|null
    {
        if (is_array($value)) {
            return implode(',', $value);
        }

        if (is_string($value) || $value instanceof Stringable) {
            return (string) $value;
        }

        return null;
    }
}
