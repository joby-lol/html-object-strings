<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Tags\AbstractContainerTag;
use Stringable;

/**
 * The <data> HTML element links a given piece of content with a
 * machine-readable translation. If the content is time- or date-related, the
 * <time> element must be used.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/data
 */
class DataTag extends AbstractContainerTag
{

    const TAG = 'data';

    /**
     * This attribute specifies the machine-readable translation of the content
     * of the element.
     *
     * @return null|string|Stringable
     */
    public function value(): null|string|Stringable
    {
        return $this->attributes()->asString('value');
    }

    /**
     * This attribute specifies the machine-readable translation of the content
     * of the element.
     *
     * @param null|string|Stringable $value
     * @return static
     */
    public function setValue(null|string|Stringable $value): self
    {
        if ($value)
            $this->attributes()['value'] = $value;
        else
            $this->unsetValue();
        return $this;
    }

    /**
     * This attribute specifies the machine-readable translation of the content
     * of the element.
     *
     * @return static
     */
    public function unsetValue(): self
    {
        unset($this->attributes()['value']);
        return $this;
    }

}
