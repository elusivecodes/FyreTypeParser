<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DB\TypeParser,
    stdClass;

trait JsonTest
{

    public function testJsonParse(): void
    {
        $this->assertSame(
            'test',
            TypeParser::getType('json')->parse('test')
        );
    }

    public function testJsonParseNumber(): void
    {
        $this->assertSame(
            33.3,
            TypeParser::getType('json')->parse(33.3)
        );
    }

    public function testJsonParseArray(): void
    {
        $this->assertSame(
            [1, 2, 3],
            TypeParser::getType('json')->parse([1, 2, 3])
        );
    }

    public function testJsonParseObject(): void
    {
        $obj = new stdClass;

        $this->assertSame(
            $obj,
            TypeParser::getType('json')->parse($obj)
        );
    }

    public function testJsonParseTrue(): void
    {
        $this->assertTrue(
            TypeParser::getType('json')->parse(true)
        );
    }

    public function testJsonParseFalse(): void
    {
        $this->assertFalse(
            TypeParser::getType('json')->parse(false)
        );
    }

    public function testJsonParseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('json')->parse(null)
        );
    }

    public function testJsonFromDatabase(): void
    {
        $this->assertSame(
            'test',
            TypeParser::getType('json')->fromDatabase('"test"')
        );
    }

    public function testJsonFromDatabaseNumber(): void
    {
        $this->assertSame(
            33.3,
            TypeParser::getType('json')->fromDatabase('33.3')
        );
    }

    public function testJsonFromDatabaseArray(): void
    {
        $this->assertSame(
            [1, 2, 3],
            TypeParser::getType('json')->fromDatabase('[1,2,3]')
        );
    }

    public function testJsonFromDatabaseObject(): void
    {
        $this->assertSame(
            ['a' => 1],
            TypeParser::getType('json')->fromDatabase('{"a":1}')
        );
    }

    public function testJsonFromDatabaseTrue(): void
    {
        $this->assertTrue(
            TypeParser::getType('json')->fromDatabase('true')
        );
    }

    public function testJsonFromDatabaseFalse(): void
    {
        $this->assertFalse(
            TypeParser::getType('json')->fromDatabase('false')
        );
    }

    public function testJsonFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('json')->fromDatabase(null)
        );
    }

    public function testJsonToDatabase(): void
    {
        $this->assertSame(
            '"test"',
            TypeParser::getType('json')->toDatabase('test')
        );
    }

    public function testJsonToDatabaseNumber(): void
    {
        $this->assertSame(
            '33.3',
            TypeParser::getType('json')->toDatabase(33.3)
        );
    }

    public function testJsonToDatabaseArray(): void
    {
        $this->assertSame(
            '[1,2,3]',
            TypeParser::getType('json')->toDatabase([1, 2, 3])
        );
    }

    public function testJsonToDatabaseObject(): void
    {
        $obj = new stdClass;
        $obj->a = 1;

        $this->assertSame(
            '{"a":1}',
            TypeParser::getType('json')->toDatabase($obj)
        );
    }

    public function testJsonToDatabaseTrue(): void
    {
        $this->assertSame(
            'true',
            TypeParser::getType('json')->toDatabase(true)
        );
    }

    public function testJsonToDatabaseFalse(): void
    {
        $this->assertSame(
            'false',
            TypeParser::getType('json')->toDatabase(false)
        );
    }

    public function testJsonToDatabaseNull(): void
    {
        $this->assertSame(
            null,
            TypeParser::getType('json')->toDatabase(null)
        );
    }

}
