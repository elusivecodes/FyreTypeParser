<?php
declare(strict_types=1);

namespace Fyre\DB\Types;

use DateTimeInterface;
use DateTimeZone;
use Fyre\DateTime\DateTime;
use Throwable;

use function ctype_digit;
use function is_scalar;
use function is_string;

/**
 * DateTimeType
 */
class DateTimeType extends Type
{
    protected array $formats = [
        'Y-m-d H:i',
        'Y-m-d H:i:s',
        'Y-m-d H:i:sP',
        'Y-m-d H:i:s.u',
        'Y-m-d H:i:s.uP',
        'Y-m-d\TH:i',
        'Y-m-d\TH:i:s',
        'Y-m-d\TH:i:sP',
        'Y-m-d\TH:i:s.u',
        'Y-m-d\TH:i:s.uP',
    ];

    protected string|null $localeFormat = null;

    protected string $serverFormat = 'Y-m-d H:i:s';

    protected string|null $serverTimeZone = null;

    protected string|null $userTimeZone = null;

    /**
     * Parse a database value to PHP value.
     *
     * @param mixed $value The database value.
     * @return DateTime|null The PHP value.
     */
    public function fromDatabase(mixed $value): DateTime|null
    {
        if ($value === null) {
            return null;
        }

        if (ctype_digit((string) $value)) {
            $date = DateTime::createFromTimestamp((int) $value, $this->serverTimeZone);
        } else if (is_string($value)) {
            $timeZoneName = $this->serverTimeZone ?? DateTime::now()->getTimeZone();
            $timeZone = new DateTimeZone($timeZoneName);

            $date = new \DateTime($value, $timeZone);
            $date = DateTime::createFromNativeDateTime($date, $this->userTimeZone);
        }

        if ($this->userTimeZone && $date->getTimeZone() !== $this->userTimeZone) {
            $date = $date->withTimeZone($this->userTimeZone);
        }

        return $date;
    }

    /**
     * Get the locale format.
     *
     * @return string|null The locale format.
     */
    public function getLocaleFormat(): string|null
    {
        return $this->localeFormat;
    }

    /**
     * Get the server time zone.
     *
     * @return string|null The server time zone.
     */
    public function getServerTimeZone(): string|null
    {
        return $this->serverTimeZone;
    }

    /**
     * Get the user time zone.
     *
     * @return string|null The user time zone.
     */
    public function getUserTimeZone(): string|null
    {
        return $this->userTimeZone;
    }

    /**
     * Parse a user value to PHP value.
     *
     * @param mixed $value The user value.
     * @return DateTime|null The PHP value.
     */
    public function parse(mixed $value): DateTime|null
    {
        if ($value === null) {
            return null;
        }

        $date = null;

        if (is_scalar($value) && ctype_digit((string) $value)) {
            $date = DateTime::createFromTimestamp((int) $value, $this->userTimeZone);
        } else if ($value instanceof DateTime) {
            $date = $value;
        } else if ($value instanceof DateTimeInterface) {
            $date = DateTime::createFromNativeDateTime($value, $this->userTimeZone);
        } else if (is_string($value)) {
            if ($this->localeFormat) {
                try {
                    $date = DateTime::createFromFormat($this->localeFormat, $value, $this->userTimeZone);
                } catch (Throwable $e) {
                    $date = null;
                }
            }

            if ($date === null) {
                $timeZoneName = $this->userTimeZone ?? DateTime::getDefaultTimeZone();
                $timeZone = new DateTimeZone($timeZoneName);

                foreach ($this->formats as $format) {
                    $tempDate = \DateTime::createFromFormat($format, $value, $timeZone);

                    if (!$tempDate) {
                        continue;
                    }

                    $date = DateTime::createFromNativeDateTime($tempDate, $this->userTimeZone);
                    break;
                }
            }
        }

        return $date;
    }

    /**
     * Set the locale format.
     *
     * @param string|null $format The locale format.
     * @return DateTimeType The DateTimeType.
     */
    public function setLocaleFormat(string|null $format): static
    {
        $this->localeFormat = $format;

        return $this;
    }

    /**
     * Set the server time zone.
     *
     * @param string|null $timeZone The server time zone.
     * @return DateTimeType The DateTimeType.
     */
    public function setServerTimeZone(string|null $timeZone): static
    {
        $this->serverTimeZone = $timeZone;

        return $this;
    }

    /**
     * Set the user time zone.
     *
     * @param string|null $timeZone The user time zone.
     * @return DateTimeType The DateTimeType.
     */
    public function setUserTimeZone(string|null $timeZone): static
    {
        $this->userTimeZone = $timeZone;

        return $this;
    }

    /**
     * Parse a PHP value to database value.
     *
     * @param mixed $value The PHP value.
     * @return string|null The database value.
     */
    public function toDatabase(mixed $value): string|null
    {
        $value = $this->parse($value);

        if ($value === null) {
            return null;
        }

        if ($this->serverTimeZone && $value->getTimeZone() !== $this->serverTimeZone) {
            $value = $value->withTimeZone($this->serverTimeZone);
        }

        return $value
            ->toNativeDateTime()
            ->format($this->serverFormat);
    }
}
