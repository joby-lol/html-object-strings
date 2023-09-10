<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use Stringable;

/**
 * Holds a year/week pair that will be stringed to something like 2011-W47
 */
class DatetimeValue_week extends DatetimeValue
{
    public static function fromString(string|Stringable|null $string): null|self
    {
        // null string returns null
        if (is_null($string)) return null;
        // try to match regular expression
        elseif (
            preg_match(
                sprintf(
                    '/^%s\-W%s$/i',
                    static::REGEX_YEAR,
                    static::REGEX_WEEKNUM
                ),
                $string,
                $matches
            )
        ) {
            return new self(
                intval($matches['year']),
                intval($matches['weeknum'])
            );
        }
        // return null if nothing found
        return null;
    }

    public function __construct(public int $year, public int $week)
    {
    }

    public function __toString()
    {
        return sprintf(
            '%s%04d-%02d',
            $this->year < 0 ? '-' : '',
            abs($this->year),
            $this->week
        );
    }
}