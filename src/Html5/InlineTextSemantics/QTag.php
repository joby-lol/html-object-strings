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

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Tags\AbstractContainerTag;
use Stringable;

/**
 * The <q> HTML element indicates that the enclosed text is a short inline
 * quotation. Most modern browsers implement this by surrounding the text in
 * quotation marks. This element is intended for short quotations that don't
 * require paragraph breaks; for long quotations use the <blockquote> element.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/q
 */
class QTag extends AbstractContainerTag
{
    const TAG = 'q';

    /**
     * The value of this attribute is a URL that designates a source document or
     * message for the information quoted. This attribute is intended to point
     * to information explaining the context or the reference for the quote.
     *
     * @return null|string|Stringable
     */
    public function cite(): null|string|Stringable
    {
        return $this->attributes()->asString('cite');
    }

    /**
     * The value of this attribute is a URL that designates a source document or
     * message for the information quoted. This attribute is intended to point
     * to information explaining the context or the reference for the quote.
     *
     * @param null|string|Stringable $cite
     * @return static
     */
    public function setCite(null|string|Stringable $cite): self
    {
        if ($cite) $this->attributes()['cite'] = $cite;
        else $this->unsetCite();
        return $this;
    }

    /**
     * The value of this attribute is a URL that designates a source document or
     * message for the information quoted. This attribute is intended to point
     * to information explaining the context or the reference for the quote.
     *
     * @return static
     */
    public function unsetCite(): self
    {
        unset($this->attributes()['cite']);
        return $this;
    }
}