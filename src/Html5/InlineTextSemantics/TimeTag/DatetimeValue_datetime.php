<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use DateTime;
use DateTimeZone;
use Stringable;

/**
 * Holds a date/time that will be stringed to something like
 * 2011-11-18T14:54:39.929-0600
 *
 * Stored internally as a DateTime, which is public and as such can be
 * conveniently manipulated.
 */
class DatetimeValue_datetime extends DatetimeValue
{
    /**
     * Matches either "Z" or a positive or negative offset from GMT in which the
     * colon is optional, such as +04:00 or -1030
     */
    const REGEX_TIMEZONE = '(?<timezone>Z|(\+|\-)(0[0-9]|1[0-9]|2[0-3]):?(0[0-9]|[0-5][0-9]))';

    public static function fromString(string|Stringable|null $string): null|self
    {
        // null string returns null
        if (is_null($string)) return null;
        // try to match regular expression
        elseif (
            preg_match(
                sprintf(
                    '/^%s\-%s\-%s(T| )%s:%s(:%s)?%s$/i',
                    static::REGEX_YEAR,
                    static::REGEX_MONTH,
                    static::REGEX_DAY,
                    static::REGEX_HOUR,
                    static::REGEX_MINUTE,
                    static::REGEX_SECOND,
                    static::REGEX_TIMEZONE,
                ),
                $string,
                $matches
            )
        ) {
            return new self(
                (new DateTime())
                    ->setTimezone(
                        self::parseTimezone($matches['timezone'])
                    )
                    ->setDate(
                        intval($matches['year']),
                        intval($matches['month']),
                        intval($matches['day'])
                    )
                    ->setTime(
                        intval($matches['hour']),
                        intval($matches['minute']),
                        intval(@$matches['second']),
                        intval(@$matches['millisecond']) * 1000
                    )
            );
        }
        // return null if nothing found
        return null;
    }

    protected static function parseTimezone(string $timezone): DateTimeZone
    {
        if ($timezone == 'Z' || $timezone == 'z') {
            return new DateTimeZone('UTC');
        } else {
            return new DateTimeZone(str_replace(':', '', $timezone));
        }
    }

    public function __construct(public DateTime $datetime)
    {
    }

    public function __toString()
    {
        return $this->datetime->format('c');
    }
}