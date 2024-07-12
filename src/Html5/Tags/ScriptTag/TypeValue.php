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

namespace Joby\HTML\Html5\Tags\ScriptTag;

/**
 * The type attribute of the <script> element indicates the type of script
 * represented by the element: a classic script, a JavaScript module, an import
 * map, or a data block.
 *
 * Descriptions by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script/type
 */
enum TypeValue: string
{
    /**
     * Indicates that the script is a "classic script", containing JavaScript
     * code. Authors are encouraged to omit the attribute if the script refers
     * to JavaScript code rather than specify a MIME type. JavaScript MIME types
     * are listed in the IANA media types specification.
     *
     * Equivalent to the attribute being unset.
     */
    case default = "text/javascript";
    /**
     * This value causes the code to be treated as a JavaScript module. The
     * processing of the script contents is deferred. The charset and defer
     * attributes have no effect. For information on using module, see our
     * JavaScript modules guide. Unlike classic scripts, module scripts require
     * the use of the CORS protocol for cross-origin fetching. 
     */
    case module = "module";
    /**
     * This value indicates that the body of the element contains an import map.
     * The import map is a JSON object that developers can use to control how
     * the browser resolves module specifiers when importing JavaScript modules
     */
    case importMap = "importmap";
}