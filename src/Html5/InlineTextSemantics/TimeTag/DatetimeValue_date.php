<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use DateTime;
use Stringable;

/**
 * Holds a date that will be stringed to something like 2011-11-18
 *
 * Stored internally as a DateTime with the time set to noon, which is public
 * and as such can be conveniently manipulated.
 */
class DatetimeValue_date extends DatetimeValue
{
    /** @var DateTime */
    public $datetime;

    public static function fromString(string|Stringable|null $string): null|self
    {
        // null string returns null
        if (is_null($string)) return null;
        // try to match regular expression
        elseif (
            preg_match(
                sprintf(
                    '/^%s\-%s\-%s$/',
                    static::REGEX_YEAR,
                    static::REGEX_MONTH,
                    static::REGEX_DAY,
                ),
                $string,
                $matches
            )
        ) {
            return new self(
                intval($matches['year']),
                intval($matches['month']),
                intval($matches['day']),
            );
        }
        // return null if nothing found
        return null;
    }

    public function __construct(int $year, int $month, int $day)
    {
        $this->datetime = (new DateTime())
            ->setDate($year,$month,$day)
            ->setTime(12,0,0,0);
    }

    public function __toString()
    {
        return $this->datetime->format('Y-m-d');
    }
}