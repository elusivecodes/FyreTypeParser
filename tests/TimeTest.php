<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime\DateTime,
    Fyre\DateTime\DateTimeImmutable,
    Fyre\DB\TypeParser;

trait TimeTest
{

    public function testTimeParse(): void
    {
        $date = TypeParser::getType('time')->parse('08:59:11');

        $this->assertInstanceOf(
            DateTimeImmutable::class,
            $date
        );

        $this->assertSame(
            '08:59:11',
            $date->format('HH:mm:ss')
        );
    }

    public function testTimeParseTimestamp(): void
    {
        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            TypeParser::getType('time')->parse(1640991551)->toISOString()
        );
    }

    public function testTimeParseDateTimeImmutable(): void
    {
        $date = DateTimeImmutable::fromTimestamp(1640991551);

        $this->assertSame(
            $date,
            TypeParser::getType('time')->parse($date)
        );
    }

    public function testTimeParseDateTime(): void
    {
        $date = DateTime::fromTimestamp(1640991551);
        $date2 = TypeParser::getType('time')->parse($date);

        $this->assertInstanceOf(
            DateTimeImmutable::class,
            $date2
        );

        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            $date2->toISOString()
        );
    }

    public function testTimeParseNative(): void
    {
        $date = new \DateTime('@1640991551');

        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            TypeParser::getType('time')->parse($date)->toISOString()
        );
    }

    public function testTimeParseLocaleFormat(): void
    {
        $timeParser = TypeParser::getType('time');

        $this->assertSame(
            $timeParser,
            $timeParser->setLocaleFormat('HH:mm:ss')
        );

        $this->assertSame(
            '11:59:00',
            $timeParser->parse('11:59:00')->format('HH:mm:ss')
        );
    }

    public function testTimeParseUserTimeZone(): void
    {
        $timeParser = TypeParser::getType('time');

        $timeParser->setUserTimeZone('Australia/Brisbane');
        $timeParser->setLocaleFormat('HH:mm:ss');

        $this->assertSame(
            'Australia/Brisbane',
            $timeParser->parse('00:00:00')->getTimeZone()
        );
    }

    public function testTimeParseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('time')->parse(null)
        );
    }

    public function testTimeParseInvalid(): void
    {
        $this->assertNull(
            TypeParser::getType('time')->parse('invalid')
        );
    }

    public function testTimeFromDatabase(): void
    {
        $this->assertSame(
            '22:59:11',
            TypeParser::getType('time')->fromDatabase('22:59:11')->format('HH:mm:ss')
        );
    }

    public function testTimeFromDatabaseTimestamp(): void
    {
        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            TypeParser::getType('time')->fromDatabase(1640991551)->toISOString()
        );
    }

    public function testTimeFromDatabaseServerTimeZone(): void
    {
        $timeParser = TypeParser::getType('time');

        $timeParser->setServerTimeZone('Australia/Brisbane');

        $this->assertSame(
            'Australia/Brisbane',
            $timeParser->fromDatabase('22:59:11')->getTimeZone()
        );
    }

    public function testTimeFromDatabaseUserTimeZone(): void
    {
        $timeParser = TypeParser::getType('time');

        $timeParser->setUserTimeZone('Australia/Brisbane');

        $this->assertSame(
            'Australia/Brisbane',
            $timeParser->fromDatabase('22:59:11')->getTimeZone()
        );
    }

    public function testTimeFromDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('time')->fromDatabase(null)
        );
    }

    public function testTimeToDatabase(): void
    {
        $date = DateTimeImmutable::fromTimestamp(1640991551);

        $this->assertSame(
            '22:59:11',
            TypeParser::getType('time')->toDatabase($date)
        );
    }

    public function testTimeToDatabaseString(): void
    {
        $this->assertSame(
            '22:59:11',
            TypeParser::getType('time')->toDatabase('22:59:11')
        );
    }

    public function testTimeToDatabaseServerTimeZone(): void
    {
        $timeParser = TypeParser::getType('time');

        $timeParser->setServerTimeZone('Australia/Brisbane');

        $date = DateTimeImmutable::fromTimestamp(1640991551);

        $this->assertSame(
            '08:59:11',
            $timeParser->toDatabase($date)
        );
    }

    public function testTimeToDatabaseNull(): void
    {
        $this->assertNull(
            TypeParser::getType('time')->toDatabase(null)
        );
    }

    public function testTimeSetServerTimeZone(): void
    {
        $timeParser = TypeParser::getType('time');

        $this->assertSame(
            $timeParser,
            $timeParser->setServerTimeZone('Australia/Brisbane')
        );

        $this->assertSame(
            'Australia/Brisbane',
            $timeParser->getServerTimeZone()
        );
    }

    public function testTimeSetUserTimeZone(): void
    {
        $timeParser = TypeParser::getType('time');

        $this->assertSame(
            $timeParser,
            $timeParser->setUserTimeZone('Australia/Brisbane')
        );

        $this->assertSame(
            'Australia/Brisbane',
            $timeParser->getUserTimeZone()
        );
    }

    public function testTimeSetLocaleFormat(): void
    {
        $timeParser = TypeParser::getType('time');

        $this->assertSame(
            $timeParser,
            $timeParser->setLocaleFormat('HH:mm:ss')
        );

        $this->assertSame(
            'HH:mm:ss',
            $timeParser->getLocaleFormat()
        );
    }

}
