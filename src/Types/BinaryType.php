<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

use Override;

use function base64_encode;
use function fopen;
use function is_resource;
use function is_string;

/**
 * BinaryType
 */
class BinaryType extends Type
{
    /**
     * Parse a database value to PHP value.
     *
     * @param mixed $value The database value.
     * @return mixed The PHP value.
     */
    #[Override]
    public function fromDatabase(mixed $value): mixed
    {
        if (is_string($value)) {
            return fopen('data:text/plain;base64,'.base64_encode($value), 'rb') ?: null;
        }

        if (is_resource($value)) {
            return $value;
        }

        return null;
    }
}
