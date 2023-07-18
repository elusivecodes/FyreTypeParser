<?php
declare(strict_types=1);

namespace Tests;

use Fyre\DateTime\DateTime;
use Fyre\DB\TypeParser;

trait DateTestTrait
{

    public function testDateParse(): void
    {
        $date = TypeParser::use('date')->parse('2022-01-01');

        $this->assertInstanceOf(
            DateTime::class,
            $date
        );

        $this->assertSame(
            '2022-01-01T00:00:00.000+00:00',
            $date->toISOString()
        );
    }

    public function testDateParseTimestamp(): void
    {
        $this->assertSame(
            '2021-12-31T00:00:00.000+00:00',
            TypeParser::use('date')->parse(1640991551)->toISOString()
        );
    }

    public function testDateParseDateTime(): void
    {
        $date = DateTime::fromTimestamp(1640991551);

        $this->assertSame(
            '2021-12-31T00:00:00.000+00:00',
            TypeParser::use('date')->parse($date)->toISOString()
        );
    }

    public function testDateParseNative(): void
    {
        $date = new \DateTime('@1640991551');

        $this->assertSame(
            '2021-12-31T00:00:00.000+00:00',
            TypeParser::use('date')->parse($date)->toISOString()
        );
    }

    public function testDateParseLocaleFormat(): void
    {
        $dateParser = TypeParser::use('date');

        $this->assertSame(
            $dateParser,
            $dateParser->setLocaleFormat('eee MMM dd yyyy')
        );

        $this->assertSame(
            '2022-01-01T00:00:00.000+00:00',
            $dateParser->parse('Sat Jan 01 2022')->toISOString()
        );
    }

    public function testDateParseUserTimeZone(): void
    {
        $dateParser = TypeParser::use('date');

        $dateParser->setUserTimeZone('Australia/Brisbane');
        $dateParser->setLocaleFormat('eee MMM dd yyyy');

        $this->assertSame(
            '2021-12-31T14:00:00.000+00:00',
            $dateParser->parse('Sat Jan 01 2022')->toISOString()
        );
    }

    public function testDateParseNull(): void
    {
        $this->assertNull(
            TypeParser::use('date')->parse(null)
        );
    }

    public function testDateParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::use('date')->parse('invalid')
        );
    }

    public function testDateFromDatabase(): void
    {
        $this->assertSame(
            '2021-12-31T00:00:00.000+00:00',
            TypeParser::use('date')->fromDatabase('2021-12-31')->toISOString()
        );
    }

    public function testDateFromDatabaseTimestamp(): void
    {
        $this->assertSame(
            '2021-12-31T00:00:00.000+00:00',
            TypeParser::use('date')->fromDatabase(1640991551)->toISOString()
        );
    }

    public function testDateFromDatabaseServerTimeZone(): void
    {
        $dateParser = TypeParser::use('date');

        $dateParser->setServerTimeZone('Australia/Brisbane');

        $this->assertSame(
            '2021-12-30T14:00:00.000+00:00',
            $dateParser->fromDatabase('2021-12-31')->toISOString()
        );
    }

    public function testDateFromDatabaseUserTimeZone(): void
    {
        $dateParser = TypeParser::use('date');

        $dateParser->setUserTimeZone('Australia/Brisbane');

        $this->assertSame(
            'Australia/Brisbane',
            $dateParser->fromDatabase('2021-12-31')->getTimeZone()
        );
    }

    public function testDateFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('date')->fromDatabase(null)
        );
    }

    public function testDateToDatabase(): void
    {
        $date = DateTime::fromTimestamp(1640991551);

        $this->assertSame(
            '2021-12-31',
            TypeParser::use('date')->toDatabase($date)
        );
    }

    public function testDateToDatabaseString(): void
    {
        $this->assertSame(
            '2021-12-31',
            TypeParser::use('date')->toDatabase('2021-12-31')
        );
    }

    public function testDateToDatabaseServerTimeZone(): void
    {
        $dateParser = TypeParser::use('date');

        $dateParser->setServerTimeZone('Australia/Brisbane');

        $date = DateTime::fromTimestamp(1640991551);

        $this->assertSame(
            '2021-12-31',
            $dateParser->toDatabase($date)
        );
    }

    public function testDateToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('date')->toDatabase(null)
        );
    }

    public function testDateSetServerTimeZone(): void
    {
        $dateParser = TypeParser::use('date');

        $this->assertSame(
            $dateParser,
            $dateParser->setServerTimeZone('Australia/Brisbane')
        );

        $this->assertSame(
            'Australia/Brisbane',
            $dateParser->getServerTimeZone()
        );
    }

    public function testDateSetUserTimeZone(): void
    {
        $dateParser = TypeParser::use('date');

        $this->assertSame(
            $dateParser,
            $dateParser->setUserTimeZone('Australia/Brisbane')
        );

        $this->assertSame(
            'Australia/Brisbane',
            $dateParser->getUserTimeZone()
        );
    }

    public function testDateSetLocaleFormat(): void
    {
        $dateParser = TypeParser::use('date');

        $this->assertSame(
            $dateParser,
            $dateParser->setLocaleFormat('eee MMM dd yyyy')
        );

        $this->assertSame(
            'eee MMM dd yyyy',
            $dateParser->getLocaleFormat()
        );
    }

}
