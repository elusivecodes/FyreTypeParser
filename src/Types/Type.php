<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

/**
 * Type
 */
abstract class Type
{

    /**
     * Parse a database value to PHP value.
     * @param mixed $value The database value.
     * @return mixed The PHP value.
     */
    public function fromDatabase($value)
    {
        return $this->parse($value);
    }

    /**
     * Parse a user value to PHP value.
     * @param mixed $value The user value.
     * @return mixed The PHP value.
     */
    public function parse($value)
    {
        return $value;
    }

    /**
     * Parse a PHP value to database value.
     * @param mixed $value The PHP value.
     * @return mixed The database value.
     */
    public function toDatabase($value)
    {
        return $this->parse($value);
    }

}
