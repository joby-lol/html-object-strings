<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <progress> HTML element displays an indicator showing the completion progress of a task, typically displayed as a progress bar.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/progress
 */
class ProgressTag extends AbstractContainerTag
{

    const TAG = 'progress';

    /**
     * This attribute describes how much work the task indicated by the progress element requires. The max attribute, if present, must have a value greater than 0 and be a valid floating point number. The default value is 1.
     *
     * @return null|float
     */
    public function max(): null|float
    {
        return $this->attributes()->asFloat('max');
    }

    /**
     * This attribute describes how much work the task indicated by the progress element requires. The max attribute, if present, must have a value greater than 0 and be a valid floating point number. The default value is 1.
     *
     * @param null|float $max
     * @return static
     */
    public function setMax(null|float $max): static
    {
        if ($max !== null)
            $this->attributes()['max'] = $max;
        else
            $this->unsetMax();
        return $this;
    }

    /**
     * This attribute describes how much work the task indicated by the progress element requires. The max attribute, if present, must have a value greater than 0 and be a valid floating point number. The default value is 1.
     *
     * @return static
     */
    public function unsetMax(): static
    {
        unset($this->attributes()['max']);
        return $this;
    }

    /**
     * This attribute specifies how much of the task that has been completed. It must be a valid floating point number between 0 and max, or between 0 and 1 if max is omitted. If there is no value attribute, the progress bar is indeterminate; this indicates that an activity is ongoing with no indication of how long it is expected to take.
     *
     * @return null|float
     */
    public function value(): null|float
    {
        return $this->attributes()->asFloat('value');
    }

    /**
     * This attribute specifies how much of the task that has been completed. It must be a valid floating point number between 0 and max, or between 0 and 1 if max is omitted. If there is no value attribute, the progress bar is indeterminate; this indicates that an activity is ongoing with no indication of how long it is expected to take.
     *
     * @param null|float $value
     * @return static
     */
    public function setValue(null|float $value): static
    {
        if ($value !== null)
            $this->attributes()['value'] = $value;
        else
            $this->unsetValue();
        return $this;
    }

    /**
     * This attribute specifies how much of the task that has been completed. It must be a valid floating point number between 0 and max, or between 0 and 1 if max is omitted. If there is no value attribute, the progress bar is indeterminate; this indicates that an activity is ongoing with no indication of how long it is expected to take.
     *
     * @return static
     */
    public function unsetValue(): static
    {
        unset($this->attributes()['value']);
        return $this;
    }

}
