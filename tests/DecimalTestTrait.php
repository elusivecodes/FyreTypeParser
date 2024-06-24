<?php
declare(strict_types=1);

namespace Tests;

use Fyre\DB\TypeParser;

trait DecimalTestTrait
{
    public function testDecimalFromDatabase(): void
    {
        $this->assertSame(
            '33.3',
            TypeParser::use('decimal')->fromDatabase('33.3')
        );
    }

    public function testDecimalFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('decimal')->fromDatabase(null)
        );
    }

    public function testDecimalParse(): void
    {
        $this->assertSame(
            '33.3',
            TypeParser::use('decimal')->parse('33.3')
        );
    }

    public function testDecimalParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::use('decimal')->parse('invalid')
        );
    }

    public function testDecimalParseNull(): void
    {
        $this->assertNull(
            TypeParser::use('decimal')->parse(null)
        );
    }

    public function testDecimalToDatabase(): void
    {
        $this->assertSame(
            '33.3',
            TypeParser::use('decimal')->toDatabase('33.3')
        );
    }

    public function testDecimalToDatabaseInvalid(): void
    {
        $this->assertNull(
            TypeParser::use('decimal')->toDatabase('invalid')
        );
    }

    public function testDecimalToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('decimal')->toDatabase(null)
        );
    }
}
