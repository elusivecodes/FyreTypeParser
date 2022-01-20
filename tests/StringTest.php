<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DB\TypeParser,
    stdClass;

trait StringTest
{

    public function testStringParse(): void
    {
        $this->assertSame(
            'test',
            TypeParser::getType('string')->parse('test')
        );
    }

    public function testStringParseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('string')->parse(null)
        );
    }

    public function testStringParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::getType('string')->parse(new stdClass)
        );
    }

    public function testStringFromDatabase(): void
    {
        $this->assertSame(
            'test',
            TypeParser::getType('string')->fromDatabase('test')
        );
    }

    public function testStringFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('string')->fromDatabase(null)
        );
    }

    public function testStringToDatabase(): void
    {
        $this->assertSame(
            'test',
            TypeParser::getType('string')->toDatabase('test')
        );
    }

    public function testStringToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('string')->toDatabase(null)
        );
    }

    public function testStringToDatabaseInvalid(): void
    {
        $obj = new stdClass;

        $this->assertNull(
            TypeParser::getType('string')->toDatabase(new stdClass)
        );
    }

}
