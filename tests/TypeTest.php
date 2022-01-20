<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime\DateTime,
    Fyre\DB\TypeParser,
    PHPUnit\Framework\TestCase;

final class TypeTest extends TestCase
{

    use
        BooleanTest,
        DateTest,
        DateTimeTest,
        DecimalTest,
        FloatTest,
        IntegerTest,
        JsonTest,
        StringTest,
        TimeTest;

    public function testGetType(): void
    {
        $this->assertSame(
            TypeParser::getType('boolean'),
            TypeParser::getType('boolean')
        );
    }
    
    protected function setUp(): void
    {
        TypeParser::clear();
    }

    public static function setUpBeforeClass(): void
    {
        DateTime::setDefaultTimeZone('UTC');
    }

}
