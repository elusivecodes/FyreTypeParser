<?php
declare(strict_types=1);

namespace Fyre\DB;

use Fyre\Container\Container;
use Fyre\DB\Types\BinaryType;
use Fyre\DB\Types\BooleanType;
use Fyre\DB\Types\DateTimeFractionalType;
use Fyre\DB\Types\DateTimeTimeZoneType;
use Fyre\DB\Types\DateTimeType;
use Fyre\DB\Types\DateType;
use Fyre\DB\Types\DecimalType;
use Fyre\DB\Types\EnumType;
use Fyre\DB\Types\FloatType;
use Fyre\DB\Types\IntegerType;
use Fyre\DB\Types\JsonType;
use Fyre\DB\Types\SetType;
use Fyre\DB\Types\StringType;
use Fyre\DB\Types\TextType;
use Fyre\DB\Types\TimeType;
use Fyre\DB\Types\Type;
use Fyre\Utility\Traits\MacroTrait;

use function array_key_exists;

/**
 * TypeParser
 */
class TypeParser
{
    use MacroTrait;

    protected const ALIASES = [
        'bool' => 'boolean',
        'int' => 'integer',
    ];

    protected array $handlers = [];

    protected array $types = [
        'binary' => BinaryType::class,
        'boolean' => BooleanType::class,
        'date' => DateType::class,
        'datetime' => DateTimeType::class,
        'datetime-fractional' => DateTimeFractionalType::class,
        'datetime-timezone' => DateTimeTimeZoneType::class,
        'decimal' => DecimalType::class,
        'double' => DecimalType::class,
        'enum' => EnumType::class,
        'float' => FloatType::class,
        'integer' => IntegerType::class,
        'json' => JsonType::class,
        'set' => SetType::class,
        'string' => StringType::class,
        'text' => TextType::class,
        'time' => TimeType::class,
    ];

    /**
     * New TypeParser constructor.
     *
     * @param Container $container The Container.
     */
    public function __construct(
        protected Container $container
    ) {}

    /**
     * Clear all loaded types.
     */
    public function clear(): void
    {
        $this->handlers = [];
    }

    /**
     * Get the type class.
     *
     * @param string $type The value type.
     * @return string The class name.
     */
    public function getType(string $type): string
    {
        if (array_key_exists($type, static::ALIASES) && !array_key_exists($type, $this->types)) {
            $type = static::ALIASES[$type];
        }

        return $this->types[$type] ?? StringType::class;
    }

    /**
     * Get the type class map.
     *
     * @return array The type class map.
     */
    public function getTypeMap(): array
    {
        return $this->types;
    }

    /**
     * Map a value type to a class.
     *
     * @param string $type The value type.
     * @param string $typeClass The class name.
     * @return static The TypeParser.
     */
    public function map(string $type, string $typeClass): static
    {
        $this->types[$type] = $typeClass;

        return $this;
    }

    /**
     * Get a Type class for a value type.
     *
     * @param string $type The value type.
     * @return Type The Type.
     */
    public function use(string $type): Type
    {
        $typeClass = $this->getType($type);

        return $this->handlers[$typeClass] ??= $this->container->build($typeClass);
    }
}
