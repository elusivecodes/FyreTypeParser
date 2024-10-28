<?php
declare(strict_types=1);

namespace Tests;

use Fyre\DateTime\DateTime;

trait DateTimeFractionalTestTrait
{
    public function testDateTimeFractionalFromDatabase(): void
    {
        $this->assertSame(
            '2021-12-31T22:59:11.123+00:00',
            $this->type->use('datetime-fractional')->fromDatabase('2021-12-31 22:59:11.12345')->toISOString()
        );
    }

    public function testDateTimeFractionalFromDatabaseNull(): void
    {
        $this->assertNull(
            $this->type->use('datetime-fractional')->fromDatabase(null)
        );
    }

    public function testDateTimeFractionalFromDatabaseServerTimeZone(): void
    {
        $dateParser = $this->type->use('datetime-fractional');

        $dateParser->setServerTimeZone('Australia/Brisbane');

        $this->assertSame(
            '2021-12-31T12:59:11.123+00:00',
            $dateParser->fromDatabase('2021-12-31 22:59:11.12345')->toISOString()
        );
    }

    public function testDateTimeFractionalFromDatabaseTimestamp(): void
    {
        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            $this->type->use('datetime-fractional')->fromDatabase(1640991551)->toISOString()
        );
    }

    public function testDateTimeFractionalFromDatabaseUserTimeZone(): void
    {
        $dateParser = $this->type->use('datetime-fractional');

        $dateParser->setUserTimeZone('Australia/Brisbane');

        $this->assertSame(
            'Australia/Brisbane',
            $dateParser->fromDatabase('2021-12-31 22:59:11.12345')->getTimeZone()
        );
    }

    public function testDateTimeFractionalParse(): void
    {
        $date = $this->type->use('datetime-fractional')->parse('2022-01-01T08:59:11.12345');

        $this->assertInstanceOf(
            DateTime::class,
            $date
        );

        $this->assertSame(
            '2022-01-01T08:59:11.123+00:00',
            $date->toISOString()
        );
    }

    public function testDateTimeFractionalParseDateTime(): void
    {
        $date = DateTime::fromTimestamp(1640991551);

        $this->assertSame(
            $date,
            $this->type->use('datetime-fractional')->parse($date)
        );
    }

    public function testDateTimeFractionalParseInvalid(): void
    {
        $this->assertNull(
            $this->type->use('datetime-fractional')->parse('invalid')
        );
    }

    public function testDateTimeFractionalParseLocaleFormat(): void
    {
        $dateParser = $this->type->use('datetime-fractional');

        $this->assertSame(
            $dateParser,
            $dateParser->setLocaleFormat('eee MMM dd yyyy HH:mm:ss.SSS')
        );

        $this->assertSame(
            '2022-01-01T11:59:00.000+00:00',
            $dateParser->parse('Sat Jan 01 2022 11:59:00.123')->toISOString()
        );
    }

    public function testDateTimeFractionalParseNative(): void
    {
        $date = new \DateTime('@1640991551');

        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            $this->type->use('datetime-fractional')->parse($date)->toISOString()
        );
    }

    public function testDateTimeFractionalParseNull(): void
    {
        $this->assertNull(
            $this->type->use('datetime-fractional')->parse(null)
        );
    }

    public function testDateTimeFractionalParseTimestamp(): void
    {
        $this->assertSame(
            '2021-12-31T22:59:11.000+00:00',
            $this->type->use('datetime-fractional')->parse(1640991551)->toISOString()
        );
    }

    public function testDateTimeFractionalParseUserTimeZone(): void
    {
        $dateParser = $this->type->use('datetime-fractional');

        $dateParser->setUserTimeZone('Australia/Brisbane');
        $dateParser->setLocaleFormat('eee MMM dd yyyy HH:mm:ss.SSS');

        $this->assertSame(
            '2021-12-31T14:00:00.000+00:00',
            $dateParser->parse('Sat Jan 01 2022 00:00:00.12345')->toISOString()
        );
    }

    public function testDateTimeFractionalSetLocaleFormat(): void
    {
        $dateParser = $this->type->use('datetime-fractional');

        $this->assertSame(
            $dateParser,
            $dateParser->setLocaleFormat('eee MMM dd yyyy HH:mm:ss.SSS')
        );

        $this->assertSame(
            'eee MMM dd yyyy HH:mm:ss.SSS',
            $dateParser->getLocaleFormat()
        );
    }

    public function testDateTimeFractionalSetServerTimeZone(): void
    {
        $dateParser = $this->type->use('datetime-fractional');

        $this->assertSame(
            $dateParser,
            $dateParser->setServerTimeZone('Australia/Brisbane')
        );

        $this->assertSame(
            'Australia/Brisbane',
            $dateParser->getServerTimeZone()
        );
    }

    public function testDateTimeFractionalSetUserTimeZone(): void
    {
        $dateParser = $this->type->use('datetime-fractional');

        $this->assertSame(
            $dateParser,
            $dateParser->setUserTimeZone('Australia/Brisbane')
        );

        $this->assertSame(
            'Australia/Brisbane',
            $dateParser->getUserTimeZone()
        );
    }

    public function testDateTimeFractionalToDatabase(): void
    {
        $date = DateTime::fromTimestamp(1640991551);

        $this->assertSame(
            '2021-12-31 22:59:11.000000',
            $this->type->use('datetime-fractional')->toDatabase($date)
        );
    }

    public function testDateTimeFractionalToDatabaseNull(): void
    {
        $this->assertNull(
            $this->type->use('datetime-fractional')->toDatabase(null)
        );
    }

    public function testDateTimeFractionalToDatabaseServerTimeZone(): void
    {
        $dateParser = $this->type->use('datetime-fractional');

        $dateParser->setServerTimeZone('Australia/Brisbane');

        $date = DateTime::fromTimestamp(1640991551);

        $this->assertSame(
            '2022-01-01 08:59:11.000000',
            $dateParser->toDatabase($date)
        );
    }

    public function testDateTimeFractionalToDatabaseString(): void
    {
        $this->assertSame(
            '2021-12-31 22:59:11.000000',
            $this->type->use('datetime-fractional')->toDatabase('2021-12-31 22:59:11.12345')
        );
    }
}
