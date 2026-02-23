<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\InlineTextSemantics\TimeTag;

use DateTime;
use Stringable;

/**
 * Holds a time that will be stringed to something like 14.54:39.929
 *
 * Stored internally as a DateTime with the date set to today, which is public
 * and as such can be conveniently manipulated.
 * 
 * @phpstan-consistent-constructor
 */
class DatetimeValue_time extends DatetimeValue
{

    /** @var DateTime */
    public $datetime;

    public static function fromString(string|Stringable|null $string): null|static
    {
        // null string returns null
        if (is_null($string))
            return null;
        // try to match regular expression
        elseif (
            preg_match(
                sprintf(
                    '/^%s:%s(:%s)?$/',
                    static::REGEX_HOUR,
                    static::REGEX_MINUTE,
                    static::REGEX_SECOND,
                ),
                $string,
                $matches,
            )
        ) {
            return new static(
                intval($matches['hour']),
                intval($matches['minute']),
                intval(@$matches['second']),
                intval(@$matches['millisecond']),
            );
        }
        // return null if nothing found
        return null;
    }

    public function __construct(int $hour, int $minute, int $second = 0, int $millisecond = 0)
    {
        $this->datetime = (new DateTime())
            ->setTime(
                $hour,
                $minute,
                $second,
                $millisecond * 1000
            );
    }

    public function __toString()
    {
        return $this->datetime->format('H:i:s.v');
    }

}
