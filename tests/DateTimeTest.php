<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime\DateTime,
    Fyre\DateTime\DateTimeImmutable,
    Fyre\DB\TypeParser;

trait DateTimeTest
{

    public function testDateTimeParse(): void
    {
        $date = TypeParser::getType('datetime')->parse('2022-01-01T08:59:11');

        $this->assertInstanceOf(
            DateTimeImmutable::class,
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
            TypeParser::getType('datetime')->parse(1640991551)->toISOString()
        );
    }

    public function testDateTimeParseDateTimeImmutable(): void
    {
        $date = DateTimeImmutable::fromTimestamp(1640991551);

        $this->assertSame(
            $date,
            TypeParser::getType('datetime')->parse($date)
        );
    }

    public function testDateTimeParseDateTime(): void
    {
        $date = DateTime::fromTimestamp(1640991551);
        $date2 = TypeParser::getType('datetime')->parse($date);

        $this->assertInstanceOf(
            DateTimeImmutable::class,
            $date2
        );

        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeParseNative(): void
    {
        $date = new \DateTime('@1640991551');

        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            TypeParser::getType('datetime')->parse($date)->toISOString()
        );
    }

    public function testDateTimeParseLocaleFormat(): void
    {
        $dateParser = TypeParser::getType('datetime');

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
        $dateParser = TypeParser::getType('datetime');

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
            TypeParser::getType('datetime')->parse(null)
        );
    }

    public function testDateTimeParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::getType('datetime')->parse('invalid')
        );
    }

    public function testDateTimeFromDatabase(): void
    {
        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            TypeParser::getType('datetime')->fromDatabase('2021-12-31 22:59:11')->toISOString()
        );
    }

    public function testDateTimeFromDatabaseTimestamp(): void
    {
        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            TypeParser::getType('datetime')->fromDatabase(1640991551)->toISOString()
        );
    }

    public function testDateTimeFromDatabaseServerTimeZone(): void
    {
        $dateParser = TypeParser::getType('datetime');

        $dateParser->setServerTimeZone('Australia/Brisbane');

        $this->assertSame(
            '2021-12-31T12:59:11.000+00:00',
            $dateParser->fromDatabase('2021-12-31 22:59:11')->toISOString()
        );
    }

    public function testDateTimeFromDatabaseUserTimeZone(): void
    {
        $dateParser = TypeParser::getType('datetime');

        $dateParser->setUserTimeZone('Australia/Brisbane');

        $this->assertSame(
            'Australia/Brisbane',
            $dateParser->fromDatabase('2021-12-31 22:59:11')->getTimeZone()
        );
    }

    public function testDateTimeFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('datetime')->fromDatabase(null)
        );
    }

    public function testDateTimeToDatabase(): void
    {
        $date = DateTimeImmutable::fromTimestamp(1640991551);

        $this->assertSame(
            '2021-12-31 22:59:11',
            TypeParser::getType('datetime')->toDatabase($date)
        );
    }

    public function testDateTimeToDatabaseString(): void
    {
        $this->assertSame(
            '2021-12-31 22:59:11',
            TypeParser::getType('datetime')->toDatabase('2021-12-31 22:59:11')
        );
    }

    public function testDateTimeToDatabaseServerTimeZone(): void
    {
        $dateParser = TypeParser::getType('datetime');

        $dateParser->setServerTimeZone('Australia/Brisbane');

        $date = DateTimeImmutable::fromTimestamp(1640991551);

        $this->assertSame(
            '2022-01-01 08:59:11',
            $dateParser->toDatabase($date)
        );
    }

    public function testDateTimeToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('datetime')->toDatabase(null)
        );
    }

    public function testDateTimeSetServerTimeZone(): void
    {
        $dateParser = TypeParser::getType('datetime');

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
        $dateParser = TypeParser::getType('datetime');

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
        $dateParser = TypeParser::getType('datetime');

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
