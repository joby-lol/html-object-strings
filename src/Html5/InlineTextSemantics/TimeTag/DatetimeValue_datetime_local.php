<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use DateTime;
use Stringable;

/**
 * Holds a date/time that will be stringed to something like
 * 2011-11-18T14:54:39.929 for use as a local time without an attached timezone.
 *
 * Stored internally as a DateTime, which is public and as such can be
 * conveniently manipulated.
 */
class DatetimeValue_datetime_local extends DatetimeValue
{
    public static function fromString(string|Stringable|null $string): null|self
    {
        // null string returns null
        if (is_null($string)) return null;
        // try to match regular expression
        elseif (
            preg_match(
                sprintf(
                    '/^%s\-%s\-%s(t|T| )%s:%s(:%s)?$/',
                    static::REGEX_YEAR,
                    static::REGEX_MONTH,
                    static::REGEX_DAY,
                    static::REGEX_HOUR,
                    static::REGEX_MINUTE,
                    static::REGEX_SECOND,
                ),
                $string,
                $matches
            )
        ) {
            return new self(
                (new DateTime())
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

    public function __construct(public DateTime $datetime)
    {
    }

    public function __toString()
    {
        return $this->datetime->format('Y-m-d\TH:i:s.v');
    }
}