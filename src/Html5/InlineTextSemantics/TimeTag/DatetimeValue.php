<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use ByJoby\HTML\Helpers\StringableValue;
use Stringable;

abstract class DatetimeValue implements StringableValue
{
    /** @var array<int,class-string<DatetimeValue>> */
    const SUBCLASSES = [
        DatetimeValue_datetime::class,
        DatetimeValue_datetime_local::class,
        DatetimeValue_time::class,
        DatetimeValue_year::class,
        DatetimeValue_month::class,
        DatetimeValue_date::class,
        DatetimeValue_date_yearless::class,
        DatetimeValue_week::class,
        DatetimeValue_duration::class,
    ];

    /**
     * Matches any sequence of at least four digits, optionally prefixed with a
     * dash for negative (BCE) years
     */
    const REGEX_YEAR = '(?<year>(\-)?[0-9]{4,})';

    /**
     * Matches any integer from 01 to 12, leading zero optional
     */
    const REGEX_MONTH = '(?<month>0?[1-9]|1[0-2])';

    /**
     * Matches any integer from 01 to 31, leading zero optional
     */
    const REGEX_DAY = '(?<day>0?[1-9]|[0-2][0-9]|3[0-1])';

    /**
     * Matches any integer from 01 to 53, leading zero optional
     */
    const REGEX_WEEKNUM = '(?<weeknum>0?[1-9]|[1-4][0-9]|5[0-3])';

    /**
     * Matches any integer from 00 to 59, leading zero optional
     */
    const REGEX_HOUR = '(?<hour>0?[0-9]|1[0-9]|2[0-3])';

    /**
     * Matches any integer from 00 to 59, leading zero optional
     */
    const REGEX_MINUTE = '(?<minute>0?[0-9]|[1-5][0-9])';

    /**
     * Matches any integer from 00 to 59, leading zero optional. Optionally
     * followed by a three-digit decimal portion.
     */
    const REGEX_SECOND = '((?<second>0?[0-9]|[1-5][0-9])(\.(?<millisecond>[0-9]{3}))?)';

    /**
     * Tries parsing with all subclasses and returns the first one that
     * succeeds, or null if nothing does.
     *
     * @param string|Stringable|null $string
     * @return null|self
     */
    public static function fromString(string|Stringable|null $string): null|self
    {
        if (is_null($string)) return null;
        foreach (static::SUBCLASSES as $class) {
            $result = $class::fromString(strval($string));
            if ($result) return $result;
        }
        return null;
    }
}