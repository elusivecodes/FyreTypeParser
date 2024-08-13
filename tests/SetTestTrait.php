<?php
declare(strict_types=1);

namespace Tests;

use Fyre\DB\TypeParser;
use stdClass;

trait SetTestTrait
{
    public function testSetFromDatabase(): void
    {
        $this->assertSame(
            ['a', 'b', 'c'],
            TypeParser::use('set')->fromDatabase('a,b,c')
        );
    }

    public function testSetFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('set')->fromDatabase(null)
        );
    }

    public function testSetParse(): void
    {
        $this->assertSame(
            ['a', 'b', 'c'],
            TypeParser::use('set')->parse('a,b,c')
        );
    }

    public function testSetParseArray(): void
    {
        $this->assertSame(
            ['a', 'b', 'c'],
            TypeParser::use('set')->parse(['a', 'b', 'c'])
        );
    }

    public function testSetParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::use('set')->parse(new stdClass())
        );
    }

    public function testSetParseNull(): void
    {
        $this->assertNull(
            TypeParser::use('set')->parse(null)
        );
    }

    public function testSetToDatabase(): void
    {
        $this->assertSame(
            'a,b,c',
            TypeParser::use('set')->toDatabase(['a', 'b', 'c'])
        );
    }

    public function testSetToDatabaseInvalid(): void
    {
        $obj = new stdClass();

        $this->assertNull(
            TypeParser::use('set')->toDatabase(new stdClass())
        );
    }

    public function testSetToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('set')->toDatabase(null)
        );
    }

    public function testSetToDatabaseString(): void
    {
        $this->assertSame(
            'a,b,c',
            TypeParser::use('set')->toDatabase('a,b,c')
        );
    }
}
