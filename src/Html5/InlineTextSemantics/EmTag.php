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
 * The <em> HTML element marks text that has stress emphasis. The <em> element
 * can be nested, with each level of nesting indicating a greater degree of
 * emphasis.
 *
 * The <em> element is for words that have a stressed emphasis compared to
 * surrounding text, which is often limited to a word or words of a sentence and
 * affects the meaning of the sentence itself.
 *
 * Typically this element is displayed in italic type. However, it should not be
 * used to apply italic styling; use the CSS font-style property for that
 * purpose. Use the <cite> element to mark the title of a work (book, play,
 * song, etc.). Use the <i> element to mark text that is in an alternate tone or
 * mood, which covers many common situations for italics such as scientific
 * names or words in other languages. Use the <strong> element to mark text that
 * has greater importance than surrounding text.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/em
 */
class EmTag extends AbstractContainerTag
{
    const TAG = 'em';
}