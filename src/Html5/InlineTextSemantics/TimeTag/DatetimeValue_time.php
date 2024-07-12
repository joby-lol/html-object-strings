<?php

/**
 * Joby's HTML Object Strings: https://code.byjoby.com/html-object-strings/
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
use Stringable;

/**
 * Holds a time that will be stringed to something like 14.54:39.929
 *
 * Stored internally as a DateTime with the date set to today, which is public
 * and as such can be conveniently manipulated.
 */
class DatetimeValue_time extends DatetimeValue
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
                    '/^%s:%s(:%s)?$/',
                    static::REGEX_HOUR,
                    static::REGEX_MINUTE,
                    static::REGEX_SECOND,
                ),
                $string,
                $matches
            )
        ) {
            return new self(
                intval($matches['hour']),
                intval($matches['minute']),
                intval(@$matches['second']),
                intval(@$matches['millisecond'])
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