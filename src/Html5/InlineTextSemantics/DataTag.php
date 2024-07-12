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
        if ($value) $this->attributes()['value'] = $value;
        else $this->unsetValue();
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