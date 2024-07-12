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

namespace Joby\HTML\Html5\Tags\LinkTag;

/**
 * A string indicating which referrer to use when fetching the resource. These
 * values are valid in <link> elements.
 *
 * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
 */
enum ReferrerPolicyValue: string
{
    /**
     * means that the Referer header will not be sent.
     */
    case noReferrer = "no-referrer";
    /**
     * means that no Referer header will be sent when navigating to an origin
     * without TLS (HTTPS). This is a user agent's default behavior, if no
     * policy is otherwise specified. 
     */
    case noReferrerWhenDowngrade = "no-referrer-when-downgrade";
    /**
     * means that the referrer will be the origin of the page, which is roughly
     * the scheme, the host, and the port.
     */
    case origin = "origin";
    /**
     * means that navigating to other origins will be limited to the scheme, the
     * host, and the port, while navigating on the same origin will include the
     * referrer's path.
     */
    case originWhenCrossOrigin = "origin-when-cross-origin";
    /**
     * means that the referrer will include the origin and the path (but not the
     * fragment, password, or username). This case is unsafe because it can leak
     * origins and paths from TLS-protected resources to insecure origins. 
     */
    case unsafeUrl = "unsafe-url";
}