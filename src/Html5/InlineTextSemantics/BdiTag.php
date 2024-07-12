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
 * The <bdi> HTML element tells the browser's bidirectional algorithm to treat
 * the text it contains in isolation from its surrounding text. It's
 * particularly useful when a website dynamically inserts some text and doesn't
 * know the directionality of the text being inserted.
 *
 * Bidirectional text is text that may contain both sequences of characters that
 * are arranged left-to-right (LTR) and sequences of characters that are
 * arranged right-to-left (RTL), such as an Arabic quotation embedded in an
 * English string. Browsers implement the Unicode Bidirectional Algorithm to
 * handle this. In this algorithm, characters are given an implicit
 * directionality: for example, Latin characters are treated as LTR while Arabic
 * characters are treated as RTL. Some other characters (such as spaces and some
 * punctuation) are treated as neutral and are assigned directionality based on
 * that of their surrounding characters.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/bdi
 */
class BdiTag extends AbstractContainerTag
{
    const TAG = 'bdi';
}