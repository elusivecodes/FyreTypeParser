<?php
declare(strict_types=1);

namespace Fyre\DB;

use Fyre\DB\Types\BooleanType;
use Fyre\DB\Types\DateTimeFractionalType;
use Fyre\DB\Types\DateTimeTimeZoneType;
use Fyre\DB\Types\DateTimeType;
use Fyre\DB\Types\DateType;
use Fyre\DB\Types\DecimalType;
use Fyre\DB\Types\FloatType;
use Fyre\DB\Types\IntegerType;
use Fyre\DB\Types\JsonType;
use Fyre\DB\Types\StringType;
use Fyre\DB\Types\TimeType;
use Fyre\DB\Types\Type;

/**
 * TypeParser
 */
abstract class TypeParser
{
    protected static array $handlers = [];

    protected static array $types = [
        'boolean' => BooleanType::class,
        'date' => DateType::class,
        'datetime' => DateTimeType::class,
        'datetime-fractional' => DateTimeFractionalType::class,
        'datetime-timezone' => DateTimeTimeZoneType::class,
        'decimal' => DecimalType::class,
        'double' => DecimalType::class,
        'float' => FloatType::class,
        'integer' => IntegerType::class,
        'json' => JsonType::class,
        'string' => StringType::class,
        'time' => TimeType::class,
    ];

    /**
     * Clear all loaded types.
     */
    public static function clear(): void
    {
        static::$handlers = [];
    }

    /**
     * Get the type class.
     *
     * @param string $type The value type.
     * @return string The class name.
     */
    public static function getType(string $type): string
    {
        return static::$types[$type] ?? StringType::class;
    }

    /**
     * Get the type class map.
     *
     * @return array The type class map.
     */
    public static function getTypeMap(): array
    {
        return static::$types;
    }

    /**
     * Map a value type to a class.
     *
     * @param string $type The value type.
     * @param string $typeClass The class name.
     */
    public static function mapType(string $type, string $typeClass): void
    {
        static::$types[$type] = $typeClass;
        unset(static::$handlers[$type]);
    }

    /**
     * Get a Type class for a value type.
     *
     * @param string $type The value type.
     * @return Type The Type.
     */
    public static function use(string $type): Type
    {
        return static::$handlers[$type] ??= static::load($type);
    }

    /**
     * Load a Type class for a value type.
     *
     * @param string $type The value type.
     * @return Type The Type.
     */
    protected static function load(string $type): Type
    {
        $typeClass = static::getType($type);

        return new $typeClass($type);
    }
}
