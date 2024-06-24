<?php
declare(strict_types=1);

namespace Tests;

use Fyre\DB\TypeParser;

trait FloatTestTrait
{
    public function testFloatFromDatabase(): void
    {
        $this->assertSame(
            33.3,
            TypeParser::use('float')->fromDatabase('33.3')
        );
    }

    public function testFloatFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('float')->fromDatabase(null)
        );
    }

    public function testFloatParse(): void
    {
        $this->assertSame(
            33.3,
            TypeParser::use('float')->parse('33.3')
        );
    }

    public function testFloatParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::use('float')->parse('invalid')
        );
    }

    public function testFloatParseNull(): void
    {
        $this->assertNull(
            TypeParser::use('float')->parse(null)
        );
    }

    public function testFloatToDatabase(): void
    {
        $this->assertSame(
            33.3,
            TypeParser::use('float')->toDatabase('33.3')
        );
    }

    public function testFloatToDatabaseInvalid(): void
    {
        $this->assertNull(
            TypeParser::use('float')->toDatabase('invalid')
        );
    }

    public function testFloatToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('float')->toDatabase(null)
        );
    }
}
