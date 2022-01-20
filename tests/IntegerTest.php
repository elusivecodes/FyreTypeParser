<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DB\TypeParser;

trait IntegerTest
{

    public function testIntegerParse(): void
    {
        $this->assertSame(
            33,
            TypeParser::getType('integer')->parse('33')
        );
    }

    public function testIntegerParseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('integer')->parse(null)
        );
    }

    public function testIntegerParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::getType('integer')->parse('invalid')
        );
    }

    public function testIntegerFromDatabase(): void
    {
        $this->assertSame(
            33,
            TypeParser::getType('integer')->fromDatabase('33')
        );
    }

    public function testIntegerFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('integer')->fromDatabase(null)
        );
    }

    public function testIntegerToDatabase(): void
    {
        $this->assertSame(
            33,
            TypeParser::getType('integer')->toDatabase('33')
        );
    }

    public function testIntegerToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('integer')->toDatabase(null)
        );
    }

    public function testIntegerToDatabaseInvalid(): void
    {
        $this->assertNull(
            TypeParser::getType('integer')->toDatabase('invalid')
        );
    }

}
