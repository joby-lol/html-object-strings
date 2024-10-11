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

use DateInterval;
use Stringable;

/**
 * Holds an interval/duration that will be stringed to something like PT4H18M3S
 */
class DatetimeValue_duration extends DatetimeValue
{
    /**
     * Matches a valid duration period designation
     */
    const REGEX_DURATION = "(<duration>P([0-9]+Y)?([0-9]+M)?([0-9]+[WD])?(T([0-9]+H)?([0-9]+M)?([0-9]+S)?)?)";

    public static function fromString(string|Stringable|null $string): null|self
    {
        // null string returns null
        if (is_null($string)) return null;
        // try to construct
        try {
            return new self(
                new DateInterval(strval($string))
            );
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function __construct(protected DateInterval $interval)
    {
    }

    public function __toString()
    {
        // format with all fields
        $string = $this->interval->format('P%yY%mM%dDT%hH%iM%sS');
        // strip out fields that are zero
        /** @var string */
        $string = preg_replace('/0[YMDHMS]/', '', $string);
        // strip trailing T if necessary
        if (str_ends_with($string, 'T')) $string = substr($string, 0, strlen($string) - 1);
        // return cleaned up value
        return $string;
    }
}