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

namespace Joby\HTML\Html5\Enums;

/**
 * A browsing context is an environment in which a browser displays a Document.
 * In modern browsers, it usually is a tab, but can be a window or even only
 * parts of a page, like a frame or an iframe.
 *
 * Descriptions by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Glossary/Browsing_context
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a
 */
enum BrowsingContext: string {
    /**
     * the current browsing context. (Default)
     */
    case current = "_self";
    /**
     * usually a new tab, but users can configure browsers to open a new window
     * instead.
     */
    case blank = "_blank";
    /**
     * the parent browsing context of the current one. If no parent, behaves as
     * _self.
     */
    case parent = "_parent";
    /**
     * the topmost browsing context (the "highest" context that's an ancestor of
     * the current one). If no ancestors, behaves as _self.
     */
    case top = "_top";
}