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

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Html5\InlineTextSemantics\TimeTag\DatetimeValue;
use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <time> HTML element represents a specific period in time. It may include
 * the datetime attribute to translate dates into machine-readable format,
 * allowing for better search engine results or custom features such as
 * reminders.
 *
 * It may represent one of the following:
 *  * A time on a 24-hour clock.
 *  * A precise date in the Gregorian calendar (with optional time and timezone
 *    information).
 *  * A valid time duration.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/time
 */
class TimeTag extends AbstractContainerTag
{
    const TAG = 'time';

    public function datetime(): null|DatetimeValue
    {
        return DatetimeValue::fromString(
            $this->attributes()->asString('datetime')
        );
    }

    public function setDatetime(null|DatetimeValue $datetime): self
    {
        if ($datetime) $this->attributes()['datetime'] = $datetime;
        else $this->unsetDatetime();
        return $this;
    }

    public function unsetDatetime(): self
    {
        unset($this->attributes()['datetime']);
        return $this;
    }
}