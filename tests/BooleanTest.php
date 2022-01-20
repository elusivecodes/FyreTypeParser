<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DB\TypeParser;

trait BooleanTest
{

    public function testBooleanParse(): void
    {
        $this->assertTrue(
            TypeParser::getType('boolean')->parse('1')
        );
    }

    public function testBooleanParseZero(): void
    {
        $this->assertFalse(
            TypeParser::getType('boolean')->parse('0')
        );
    }

    public function testBooleanParseTrue(): void
    {
        $this->assertTrue(
            TypeParser::getType('boolean')->parse(true)
        );
    }

    public function testBooleanParseFalse(): void
    {
        $this->assertFalse(
            TypeParser::getType('boolean')->parse(false)
        );
    }

    public function testBooleanParseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('boolean')->parse(null)
        );
    }

    public function testBooleanParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::getType('boolean')->parse('invalid')
        );
    }

    public function testBooleanFromDatabase(): void
    {
        $this->assertTrue(
            TypeParser::getType('boolean')->fromDatabase('1')
        );
    }

    public function testBooleanFromDatabaseZero(): void
    {
        $this->assertFalse(
            TypeParser::getType('boolean')->fromDatabase('0')
        );
    }

    public function testBooleanFromDatabaseTrue(): void
    {
        $this->assertTrue(
            TypeParser::getType('boolean')->fromDatabase(true)
        );
    }

    public function testBooleanFromDatabaseFalse(): void
    {
        $this->assertFalse(
            TypeParser::getType('boolean')->fromDatabase(false)
        );
    }

    public function testBooleanFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('boolean')->fromDatabase(null)
        );
    }

    public function testBooleanToDatabase(): void
    {
        $this->assertTrue(
            TypeParser::getType('boolean')->toDatabase('1')
        );
    }

    public function testBooleanToDatabaseZero(): void
    {
        $this->assertFalse(
            TypeParser::getType('boolean')->toDatabase('0')
        );
    }

    public function testBooleanToDatabaseTrue(): void
    {
        $this->assertTrue(
            TypeParser::getType('boolean')->toDatabase(true)
        );
    }

    public function testBooleanToDatabaseFalse(): void
    {
        $this->assertFalse(
            TypeParser::getType('boolean')->toDatabase(false)
        );
    }

    public function testBooleanToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('boolean')->toDatabase(null)
        );
    }

    public function testBooleanToDatabaseInvalid(): void
    {
        $this->assertNull(
            TypeParser::getType('boolean')->toDatabase('invalid')
        );
    }

}
