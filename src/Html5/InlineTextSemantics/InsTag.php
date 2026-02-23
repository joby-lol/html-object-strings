<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Html5\InlineTextSemantics\TimeTag\DatetimeValue;
use Joby\HTML\Tags\AbstractContainerTag;
use Stringable;

/**
 * The <ins> HTML element represents a range of text that has been added to a document. You can use the <del> element to similarly represent a range of text that has been deleted from the document.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/ins
 */
class InsTag extends AbstractContainerTag
{

    const TAG = 'ins';

    /**
     * A URI for a resource that explains the change (for example, meeting minutes).
     */
    public function cite(): null|string|Stringable
    {
        return $this->attributes()->asString('cite');
    }

    /**
     * A URI for a resource that explains the change (for example, meeting minutes).
     */
    public function setCite(null|string|Stringable $cite): static
    {
        if ($cite)
            $this->attributes()['cite'] = $cite;
        else
            $this->unsetCite();
        return $this;
    }

    /**
     * A URI for a resource that explains the change (for example, meeting minutes).
     */
    public function unsetCite(): static
    {
        unset($this->attributes()['cite']);
        return $this;
    }

    /**
     * This attribute indicates the time and date of the change and must be a valid date string with an optional time. If the value cannot be parsed as a date with an optional time string, the element does not have an associated timestamp.
     */
    public function datetime(): null|DatetimeValue
    {
        return DatetimeValue::fromString(
            $this->attributes()->asString('datetime'),
        );
    }

    /**
     * This attribute indicates the time and date of the change and must be a valid date string with an optional time. If the value cannot be parsed as a date with an optional time string, the element does not have an associated timestamp.
     */
    public function setDatetime(null|DatetimeValue $datetime): static
    {
        if ($datetime)
            $this->attributes()['datetime'] = $datetime;
        else
            $this->unsetDatetime();
        return $this;
    }

    /**
     * This attribute indicates the time and date of the change and must be a valid date string with an optional time. If the value cannot be parsed as a date with an optional time string, the element does not have an associated timestamp.
     */
    public function unsetDatetime(): static
    {
        unset($this->attributes()['datetime']);
        return $this;
    }

}
