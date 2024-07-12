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

/**
 * The <b> HTML element is used to draw the reader's attention to the element's
 * contents, which are not otherwise granted special importance. This was
 * formerly known as the Boldface element, and most browsers still draw the text
 * in boldface. However, you should not use <b> for styling text or granting
 * importance. If you wish to create boldface text, you should use the CSS
 * font-weight property. If you wish to indicate an element is of special
 * importance, you should use the <strong> element.
 *
 * Do not confuse the <b> element with the <strong>, <em>, or <mark> elements.
 * The <strong> element represents text of certain importance, <em> puts some
 * emphasis on the text and the <mark> element represents text of certain
 * relevance. The <b> element doesn't convey such special semantic information;
 * use it only when no others fit.
 *
 * It is a good practice to use the class attribute on the <b> element in order
 * to convey additional semantic information as needed (for example <b
 * class="lead"> for the first sentence in a paragraph). This makes it easier to
 * manage multiple use cases of <b> if your stylistic needs change, without the
 * need to change all of its uses in the HTML.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/b
 */
class BTag extends AbstractContainerTag
{
    const TAG = 'b';
}