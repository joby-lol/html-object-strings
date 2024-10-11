<?php

/**
 * Joby's HTML Object Strings: https://go.joby.lol/htmlobjectstrings
 * MIT License: Copyright (c) 2024 Joby Elliott
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE 
 * SOFTWARE.
 */

namespace Joby\HTML\Html5\InlineTextSemantics\TimeTag;

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