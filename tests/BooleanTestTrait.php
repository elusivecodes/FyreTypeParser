<?php
declare(strict_types=1);

namespace Tests;

use Fyre\DB\TypeParser;

trait BooleanTestTrait
{
    public function testBooleanFromDatabase(): void
    {
        $this->assertTrue(
            TypeParser::use('boolean')->fromDatabase('1')
        );
    }

    public function testBooleanFromDatabaseFalse(): void
    {
        $this->assertFalse(
            TypeParser::use('boolean')->fromDatabase(false)
        );
    }

    public function testBooleanFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('boolean')->fromDatabase(null)
        );
    }

    public function testBooleanFromDatabaseTrue(): void
    {
        $this->assertTrue(
            TypeParser::use('boolean')->fromDatabase(true)
        );
    }

    public function testBooleanFromDatabaseZero(): void
    {
        $this->assertFalse(
            TypeParser::use('boolean')->fromDatabase('0')
        );
    }

    public function testBooleanParse(): void
    {
        $this->assertTrue(
            TypeParser::use('boolean')->parse('1')
        );
    }

    public function testBooleanParseFalse(): void
    {
        $this->assertFalse(
            TypeParser::use('boolean')->parse(false)
        );
    }

    public function testBooleanParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::use('boolean')->parse('invalid')
        );
    }

    public function testBooleanParseNull(): void
    {
        $this->assertNull(
            TypeParser::use('boolean')->parse(null)
        );
    }

    public function testBooleanParseTrue(): void
    {
        $this->assertTrue(
            TypeParser::use('boolean')->parse(true)
        );
    }

    public function testBooleanParseZero(): void
    {
        $this->assertFalse(
            TypeParser::use('boolean')->parse('0')
        );
    }

    public function testBooleanToDatabase(): void
    {
        $this->assertTrue(
            TypeParser::use('boolean')->toDatabase('1')
        );
    }

    public function testBooleanToDatabaseFalse(): void
    {
        $this->assertFalse(
            TypeParser::use('boolean')->toDatabase(false)
        );
    }

    public function testBooleanToDatabaseInvalid(): void
    {
        $this->assertNull(
            TypeParser::use('boolean')->toDatabase('invalid')
        );
    }

    public function testBooleanToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('boolean')->toDatabase(null)
        );
    }

    public function testBooleanToDatabaseTrue(): void
    {
        $this->assertTrue(
            TypeParser::use('boolean')->toDatabase(true)
        );
    }

    public function testBooleanToDatabaseZero(): void
    {
        $this->assertFalse(
            TypeParser::use('boolean')->toDatabase('0')
        );
    }
}
