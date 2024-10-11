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
 * The <dfn> HTML element is used to indicate the term being defined within the
 * context of a definition phrase or sentence. The ancestor <p> element, the
 * <dt>/<dd> pairing, or the nearest <section> ancestor of the <dfn> element, is
 * considered to be the definition of the term.
 *
 * The term being defined is identified following these rules:
 *
 *  * If the <dfn> element has a title attribute, the value of the title
 *    attribute is considered to be the term being defined. The element must
 *    still have text within it, but that text may be an abbreviation (perhaps
 *    using <abbr>) or another form of the term.
 *  * If the <dfn> contains a single child element and does not have any text
 *    content of its own, and the child element is an <abbr> element with a
 *    title attribute itself, then the exact value of the <abbr> element's title
 *    is the term being defined.
 *  * Otherwise, the text content of the <dfn> element is the term being
 *    defined. This is shown in the first example below.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dfn
 */
class DataTag extends AbstractContainerTag
{
    const TAG = 'dfn';

    /**
     * If the <dfn> element has a title attribute, the value of the title
     * attribute is considered to be the term being defined. The element must
     * still have text within it, but that text may be an abbreviation (perhaps
     * using <abbr>) or another form of the term.
     *
     * @return null|string|Stringable
     */
    public function title(): null|string|Stringable
    {
        return $this->attributes()->asString('title');
    }

    /**
     * If the <dfn> element has a title attribute, the value of the title
     * attribute is considered to be the term being defined. The element must
     * still have text within it, but that text may be an abbreviation (perhaps
     * using <abbr>) or another form of the term.
     *
     * @param null|string|Stringable $title
     * @return static
     */
    public function setTitle(null|string|Stringable $title): self
    {
        if ($title) $this->attributes()['title'] = $title;
        else $this->unsetTitle();
        return $this;
    }

    /**
     * If the <dfn> element has a title attribute, the value of the title
     * attribute is considered to be the term being defined. The element must
     * still have text within it, but that text may be an abbreviation (perhaps
     * using <abbr>) or another form of the term.
     *
     * @return static
     */
    public function unsetTitle(): self
    {
        unset($this->attributes()['title']);
        return $this;
    }
}