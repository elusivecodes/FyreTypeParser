<?php
declare(strict_types=1);

namespace Fyre\DB;

use
    Fyre\DB\Types\BooleanType,
    Fyre\DB\Types\DateTimeType,
    Fyre\DB\Types\DateType,
    Fyre\DB\Types\DecimalType,
    Fyre\DB\Types\FloatType,
    Fyre\DB\Types\IntegerType,
    Fyre\DB\Types\JsonType,
    Fyre\DB\Types\StringType,
    Fyre\DB\Types\TimeType,
    Fyre\DB\Types\Type;

/**
 * TypeParser
 */
abstract class TypeParser
{

    protected static array $types = [
        'boolean' => BooleanType::class,
        'date' => DateType::class,
        'datetime' => DateTimeType::class,
        'decimal' => DecimalType::class,
        'double' => DecimalType::class,
        'float' => FloatType::class,
        'integer' => IntegerType::class,
        'json' => JsonType::class,
        'string' => StringType::class,
        'time' => TimeType::class
    ];

    protected static array $handlers = [];

    /**
     * Clear all loaded types.
     */
    public static function clear(): void
    {
        static::$handlers = [];
    }

    /**
     * Get a Type class for a value type.
     * @param string $type The value type.
     * @return Type The Type.
     */
    public static function getType(string $type): Type
    {
        return static::$handlers[$type] ??= static::load($type);
    }

    /**
     * Map a value type to a class.
     * @param string $type The value type.
     * @param string $typeClass The class name.
     */
    public static function mapType(string $type, string $typeClass): void
    {
        static::$types[$type] = $typeClass;
        unset(static::$handlers[$type]);
    }

    /**
     * Load a Type class for a value type.
     * @param string $type The value type.
     * @return Type The Type.
     */
    protected static function load(string $type): Type
    {
        $typeClass = static::$types[$type] ?? StringType::class;

        return new $typeClass($type);
    }

}
