<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

use function
    json_decode,
    json_encode;

/**
 * JsonType
 */
class JsonType extends Type
{

    protected int $encodingFlags = 0;

    /**
     * Parse a database value to PHP value.
     * @param mixed $value The database value.
     * @return mixed The PHP value.
     */
    public function fromDatabase(mixed $value): mixed
    {
        if ($value === null) {
            return null;
        }

        return json_decode($value, true);
    }

    /**
     * Set the encoding flags.
     * @param int $flags The encoding flags.
     * @return JsonType The JsonType.
     */
    public function setEncodingFlags(int $flags): static
    {
        $this->encodingFlags = $flags;

        return $this;
    }

    /**
     * Parse a PHP value to database value.
     * @param mixed $value The PHP value.
     * @return string|null The database value.
     */
    public function toDatabase(mixed $value): string|null
    {
        if ($value === null) {
            return null;
        }

        return json_encode($value, $this->encodingFlags);
    }

}
