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

namespace Joby\HTML\Html5\DocumentTags;

use Joby\HTML\Containers\DocumentTags\DoctypeInterface;
use Joby\HTML\Traits\NodeTrait;

/**
 * In HTML, the doctype is the required "<!DOCTYPE html>" preamble found at the
 * top of all documents. Its sole purpose is to prevent a browser from switching
 * into so-called "quirks mode" when rendering a document; that is, the
 * "<!DOCTYPE html>" doctype ensures that the browser makes a best-effort
 * attempt at following the relevant specifications, rather than using a
 * different rendering mode that is incompatible with some specifications.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Glossary/Doctype
 */
class Doctype implements DoctypeInterface
{
    use NodeTrait;

    public function __toString(): string
    {
        return '<!DOCTYPE html>';
    }
}
