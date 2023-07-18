<?php
declare(strict_types=1);

namespace Tests;

use Fyre\DateTime\DateTime;
use Fyre\DB\TypeParser;

trait DateTimeTestTrait
{

    public function testDateTimeParse(): void
    {
        $date = TypeParser::use('datetime')->parse('2022-01-01T08:59:11');

        $this->assertInstanceOf(
            DateTime::class,
            $date
        );

        $this->assertSame(
            '2022-01-01T08:59:11.000+00:00',
            $date->toISOString()
        );
    }

    public function testDateTimeParseTimestamp(): void
    {
        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            TypeParser::use('datetime')->parse(1640991551)->toISOString()
        );
    }

    public function testDateTimeParseDateTime(): void
    {
        $date = DateTime::fromTimestamp(1640991551);

        $this->assertSame(
            $date,
            TypeParser::use('datetime')->parse($date)
        );
    }

    public function testDateTimeParseNative(): void
    {
        $date = new \DateTime('@1640991551');

        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            TypeParser::use('datetime')->parse($date)->toISOString()
        );
    }

    public function testDateTimeParseLocaleFormat(): void
    {
        $dateParser = TypeParser::use('datetime');

        $this->assertSame(
            $dateParser,
            $dateParser->setLocaleFormat('eee MMM dd yyyy HH:mm:ss')
        );

        $this->assertSame(
            '2022-01-01T11:59:00.000+00:00',
            $dateParser->parse('Sat Jan 01 2022 11:59:00')->toISOString()
        );
    }

    public function testDateTimeParseUserTimeZone(): void
    {
        $dateParser = TypeParser::use('datetime');

        $dateParser->setUserTimeZone('Australia/Brisbane');
        $dateParser->setLocaleFormat('eee MMM dd yyyy HH:mm:ss');

        $this->assertSame(
            '2021-12-31T14:00:00.000+00:00',
            $dateParser->parse('Sat Jan 01 2022 00:00:00')->toISOString()
        );
    }

    public function testDateTimeParseNull(): void
    {
        $this->assertNull(
            TypeParser::use('datetime')->parse(null)
        );
    }

    public function testDateTimeParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::use('datetime')->parse('invalid')
        );
    }

    public function testDateTimeFromDatabase(): void
    {
        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            TypeParser::use('datetime')->fromDatabase('2021-12-31 22:59:11')->toISOString()
        );
    }

    public function testDateTimeFromDatabaseTimestamp(): void
    {
        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            TypeParser::use('datetime')->fromDatabase(1640991551)->toISOString()
        );
    }

    public function testDateTimeFromDatabaseServerTimeZone(): void
    {
        $dateParser = TypeParser::use('datetime');

        $dateParser->setServerTimeZone('Australia/Brisbane');

        $this->assertSame(
            '2021-12-31T12:59:11.000+00:00',
            $dateParser->fromDatabase('2021-12-31 22:59:11')->toISOString()
        );
    }

    public function testDateTimeFromDatabaseUserTimeZone(): void
    {
        $dateParser = TypeParser::use('datetime');

        $dateParser->setUserTimeZone('Australia/Brisbane');

        $this->assertSame(
            'Australia/Brisbane',
            $dateParser->fromDatabase('2021-12-31 22:59:11')->getTimeZone()
        );
    }

    public function testDateTimeFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('datetime')->fromDatabase(null)
        );
    }

    public function testDateTimeToDatabase(): void
    {
        $date = DateTime::fromTimestamp(1640991551);

        $this->assertSame(
            '2021-12-31 22:59:11',
            TypeParser::use('datetime')->toDatabase($date)
        );
    }

    public function testDateTimeToDatabaseString(): void
    {
        $this->assertSame(
            '2021-12-31 22:59:11',
            TypeParser::use('datetime')->toDatabase('2021-12-31 22:59:11')
        );
    }

    public function testDateTimeToDatabaseServerTimeZone(): void
    {
        $dateParser = TypeParser::use('datetime');

        $dateParser->setServerTimeZone('Australia/Brisbane');

        $date = DateTime::fromTimestamp(1640991551);

        $this->assertSame(
            '2022-01-01 08:59:11',
            $dateParser->toDatabase($date)
        );
    }

    public function testDateTimeToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::use('datetime')->toDatabase(null)
        );
    }

    public function testDateTimeSetServerTimeZone(): void
    {
        $dateParser = TypeParser::use('datetime');

        $this->assertSame(
            $dateParser,
            $dateParser->setServerTimeZone('Australia/Brisbane')
        );

        $this->assertSame(
            'Australia/Brisbane',
            $dateParser->getServerTimeZone()
        );
    }

    public function testDateTimeSetUserTimeZone(): void
    {
        $dateParser = TypeParser::use('datetime');

        $this->assertSame(
            $dateParser,
            $dateParser->setUserTimeZone('Australia/Brisbane')
        );

        $this->assertSame(
            'Australia/Brisbane',
            $dateParser->getUserTimeZone()
        );
    }

    public function testDateTimeSetLocaleFormat(): void
    {
        $dateParser = TypeParser::use('datetime');

        $this->assertSame(
            $dateParser,
            $dateParser->setLocaleFormat('eee MMM dd yyyy HH:mm:ss')
        );

        $this->assertSame(
            'eee MMM dd yyyy HH:mm:ss',
            $dateParser->getLocaleFormat()
        );
    }

}
