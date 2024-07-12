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
 * The <u> HTML element represents a span of inline text which should be
 * rendered in a way that indicates that it has a non-textual annotation. This
 * is rendered by default as a simple solid underline, but may be altered using
 * CSS.
 *
 * Valid use cases for the <u> element include annotating spelling errors,
 * applying a proper name mark to denote proper names in Chinese text, and other
 * forms of annotation.
 *
 * You should not use <u> to underline text for presentation purposes, or to
 * denote titles of books.
 *
 * In most cases, you should use an element other than <u>, such as:
 *
 *  * <em> to denote stress emphasis
 *  * <b> to draw attention to text
 *  * <mark> to mark key words or phrases
 *  * <strong> to indicate that text has strong importance
 *  * <cite> to mark the titles of books or other publications
 *  * <i> to denote technical terms, transliterations, thoughts, or names of
 *    vessels in Western texts
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/u
 */
class UTag extends AbstractContainerTag
{
    const TAG = 'u';
}