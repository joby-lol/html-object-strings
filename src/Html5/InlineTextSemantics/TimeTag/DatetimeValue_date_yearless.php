<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use DateTime;
use Stringable;

/**
 * Holds a date that will be stringed to something like 11-18
 *
 * Stored internally as a DateTime with the time set to noon, which is public
 * and as such can be conveniently manipulated. Internally the year will be set
 * to the current year.
 */
class DatetimeValue_date_yearless extends DatetimeValue
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
                    '/^%s\-%s$/',
                    static::REGEX_MONTH,
                    static::REGEX_DAY,
                ),
                $string,
                $matches
            )
        ) {
            return new self(
                intval($matches['month']),
                intval($matches['day']),
            );
        }
        // return null if nothing found
        return null;
    }

    public function __construct(int $month, int $day)
    {
        $this->datetime = (new DateTime())
            ->setDate(intval(date('Y')), $month, $day)
            ->setTime(12, 0, 0, 0);
    }

    public function __toString()
    {
        return $this->datetime->format('m-d');
    }
}