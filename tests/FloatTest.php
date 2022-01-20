<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DB\TypeParser;

trait FloatTest
{

    public function testFloatParse(): void
    {
        $this->assertSame(
            33.3,
            TypeParser::getType('float')->parse('33.3')
        );
    }

    public function testFloatParseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('float')->parse(null)
        );
    }

    public function testFloatParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::getType('float')->parse('invalid')
        );
    }

    public function testFloatFromDatabase(): void
    {
        $this->assertSame(
            33.3,
            TypeParser::getType('float')->fromDatabase('33.3')
        );
    }

    public function testFloatFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('float')->fromDatabase(null)
        );
    }

    public function testFloatToDatabase(): void
    {
        $this->assertSame(
            33.3,
            TypeParser::getType('float')->toDatabase('33.3')
        );
    }

    public function testFloatToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('float')->toDatabase(null)
        );
    }

    public function testFloatToDatabaseInvalid(): void
    {
        $this->assertNull(
            TypeParser::getType('float')->toDatabase('invalid')
        );
    }

}
