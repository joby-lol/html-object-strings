<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\InlineTextSemantics\TimeTag;

use Stringable;

/**
 * Holds a year/month pair that will be stringed to something like 2011-11
 * 
 * @phpstan-consistent-constructor
 */
class DatetimeValue_month extends DatetimeValue
{

    public static function fromString(string|Stringable|null $string): null|static
    {
        // null string returns null
        if (is_null($string))
            return null;
        // try to match regular expression
        elseif (
            preg_match(
                sprintf(
                    '/^%s\-%s$/',
                    static::REGEX_YEAR,
                    static::REGEX_MONTH,
                ),
                $string,
                $matches,
            )
        ) {
            return new static(
                intval($matches['year']),
                intval($matches['month']),
            );
        }
        // return null if nothing found
        return null;
    }

    public function __construct(public int $year, public int $week) {}

    public function __toString()
    {
        return sprintf(
            '%s%04d-%02d',
            $this->year < 0 ? '-' : '',
            abs($this->year),
            $this->week,
        );
    }

}
