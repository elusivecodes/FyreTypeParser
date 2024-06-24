<?php
declare(strict_types=1);

namespace Tests;

use Fyre\DB\TypeParser;

trait IntegerTestTrait
{
    public function testIntegerFromDatabase(): void
    {
        $this->assertSame(
            33,
            TypeParser::use('integer')->fromDatabase('33')
        );
    }

    public function testIntegerFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('integer')->fromDatabase(null)
        );
    }

    public function testIntegerParse(): void
    {
        $this->assertSame(
            33,
            TypeParser::use('integer')->parse('33')
        );
    }

    public function testIntegerParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::use('integer')->parse('invalid')
        );
    }

    public function testIntegerParseNull(): void
    {
        $this->assertNull(
            TypeParser::use('integer')->parse(null)
        );
    }

    public function testIntegerToDatabase(): void
    {
        $this->assertSame(
            33,
            TypeParser::use('integer')->toDatabase('33')
        );
    }

    public function testIntegerToDatabaseInvalid(): void
    {
        $this->assertNull(
            TypeParser::use('integer')->toDatabase('invalid')
        );
    }

    public function testIntegerToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('integer')->toDatabase(null)
        );
    }
}
