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
 * @phpstan-consistent-constructor
 */
class DatetimeValue_year extends DatetimeValue
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
                    '/^%s$/',
                    static::REGEX_YEAR,
                ),
                $string,
                $matches,
            )
        ) {
            return new static(
                intval($matches['year']),
            );
        }
        // return null if nothing found
        return null;
    }

    public function __construct(protected int $year) {}

    public function __toString()
    {
        return sprintf(
            '%s%04d',
            $this->year < 0 ? '-' : '',
            abs($this->year),
        );
    }

}
