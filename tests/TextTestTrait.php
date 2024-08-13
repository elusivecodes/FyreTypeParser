<?php
declare(strict_types=1);

namespace Tests;

use Fyre\DB\TypeParser;
use stdClass;

trait TextTestTrait
{
    public function testTextFromDatabase(): void
    {
        $this->assertSame(
            'test',
            TypeParser::use('text')->fromDatabase('test')
        );
    }

    public function testTextFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('text')->fromDatabase(null)
        );
    }

    public function testTextParse(): void
    {
        $this->assertSame(
            'test',
            TypeParser::use('text')->parse('test')
        );
    }

    public function testTextParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::use('text')->parse(new stdClass())
        );
    }

    public function testTextParseNull(): void
    {
        $this->assertNull(
            TypeParser::use('text')->parse(null)
        );
    }

    public function testTextToDatabase(): void
    {
        $this->assertSame(
            'test',
            TypeParser::use('text')->toDatabase('test')
        );
    }

    public function testTextToDatabaseInvalid(): void
    {
        $obj = new stdClass();

        $this->assertNull(
            TypeParser::use('text')->toDatabase(new stdClass())
        );
    }

    public function testTextToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('text')->toDatabase(null)
        );
    }
}
