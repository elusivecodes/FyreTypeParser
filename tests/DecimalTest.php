<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DB\TypeParser;

trait DecimalTest
{

    public function testDecimalParse(): void
    {
        $this->assertSame(
            '33.3',
            TypeParser::getType('decimal')->parse('33.3')
        );
    }

    public function testDecimalParseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('decimal')->parse(null)
        );
    }

    public function testDecimalParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::getType('decimal')->parse('invalid')
        );
    }

    public function testDecimalFromDatabase(): void
    {
        $this->assertSame(
            '33.3',
            TypeParser::getType('decimal')->fromDatabase('33.3')
        );
    }

    public function testDecimalFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('decimal')->fromDatabase(null)
        );
    }

    public function testDecimalToDatabase(): void
    {
        $this->assertSame(
            '33.3',
            TypeParser::getType('decimal')->toDatabase('33.3')
        );
    }

    public function testDecimalToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('decimal')->toDatabase(null)
        );
    }

    public function testDecimalToDatabaseInvalid(): void
    {
        $this->assertNull(
            TypeParser::getType('decimal')->toDatabase('invalid')
        );
    }

}
