<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use Stringable;

class DatetimeValue_year extends DatetimeValue
{
    public static function fromString(string|Stringable|null $string): null|self
    {
        // null string returns null
        if (is_null($string)) return null;
        // try to match regular expression
        elseif (
            preg_match(
                sprintf(
                    '/^%s$/',
                    static::REGEX_YEAR
                ),
                $string,
                $matches
            )
        ) {
            return new self(
                intval($matches['year'])
            );
        }
        // return null if nothing found
        return null;
    }

    public function __construct(protected int $year)
    {
    }

    public function __toString()
    {
        return sprintf(
            '%s%04d',
            $this->year < 0 ? '-' : '',
            abs($this->year)
        );
    }
}