<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Html5\InlineTextSemantics\TimeTag\DatetimeValue;
use ByJoby\HTML\Tags\AbstractContainerTag;
use DateInterval;
use DateTimeInterface;
use Stringable;

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

    public function setDatetime(null|DatetimeValue $datetime): static
    {
        if ($datetime) $this->attributes()['datetime'] = $datetime;
        else $this->unsetDatetime();
        return $this;
    }

    public function unsetDatetime(): static
    {
        unset($this->attributes()['datetime']);
        return $this;
    }
}