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
 * The <abbr> HTML element represents an abbreviation or acronym.
 *
 * When including an abbreviation or acronym, provide a full expansion of the
 * term in plain text on first use, along with the <abbr> to mark up the
 * abbreviation. This informs the user what the abbreviation or acronym means.
 *
 * The optional title attribute can provide an expansion for the abbreviation or
 * acronym when a full expansion is not present. This provides a hint to user
 * agents on how to announce/display the content while informing all users what
 * the abbreviation means. If present, title must contain this full description
 * and nothing else.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/abbr
 */
class AbbrTag extends AbstractContainerTag
{
    const TAG = 'abbr';

    /**
     * The title attribute has a specific semantic meaning when used with the
     * <abbr> element; it must contain a full human-readable description or
     * expansion of the abbreviation. This text is often presented by browsers
     * as a tooltip when the mouse cursor is hovered over the element.
     *
     * @return null|string|Stringable
     */
    public function title(): null|string|Stringable
    {
        return $this->attributes()->asString('title');
    }

    /**
     * The title attribute has a specific semantic meaning when used with the
     * <abbr> element; it must contain a full human-readable description or
     * expansion of the abbreviation. This text is often presented by browsers
     * as a tooltip when the mouse cursor is hovered over the element.
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
     * The title attribute has a specific semantic meaning when used with the
     * <abbr> element; it must contain a full human-readable description or
     * expansion of the abbreviation. This text is often presented by browsers
     * as a tooltip when the mouse cursor is hovered over the element.
     *
     * @return static
     */
    public function unsetTitle(): self
    {
        unset($this->attributes()['title']);
        return $this;
    }
}