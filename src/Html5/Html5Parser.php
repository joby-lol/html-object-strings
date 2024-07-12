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

namespace Joby\HTML\Html5;

use Joby\HTML\AbstractParser;
use Joby\HTML\Containers\HtmlDocumentInterface;

/**
 * A Parser configured to parse and render HTML5.
 */
class Html5Parser extends AbstractParser
{
    /** @var array<int,string> */
    protected $tag_namespaces = [
        '\\Joby\\HTML\\Html5\\ContentSectioningTags\\',
        '\\Joby\\HTML\\Html5\\DocumentTags\\',
        '\\Joby\\HTML\\Html5\\InlineTextSemantics\\',
        '\\Joby\\HTML\\Html5\\Multimedia\\',
        '\\Joby\\HTML\\Html5\\Tags\\',
        '\\Joby\\HTML\\Html5\\TextContentTags\\',
    ];

    /** @var class-string<HtmlDocumentInterface> */
    protected $document_class = Html5Document::class;
}
