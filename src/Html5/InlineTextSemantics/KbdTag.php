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

/**
 * The <kbd> HTML element represents a span of inline text denoting textual user
 * input from a keyboard, voice input, or any other text entry device. By
 * convention, the user agent defaults to rendering the contents of a <kbd>
 * element using its default monospace font, although this is not mandated by
 * the HTML standard.
 *
 * To describe an input comprised of multiple keystrokes, you can nest multiple
 * <kbd> elements, with an outer <kbd> element representing the overall input
 * and each individual keystroke or component of the input enclosed within its
 * own <kbd>, such as:
 *
 * <kbd><kbd>Ctrl</kbd>+<kbd>N</kbd></kbd>
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/kbd
 */
class KbdTag extends AbstractContainerTag
{
    const TAG = 'kbd';
}