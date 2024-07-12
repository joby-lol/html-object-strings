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

namespace Joby\HTML\Html5\Multimedia\IframeTag;

/**
 * A string indicating which referrer to use when fetching the resource.
 *
 * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe
 */
enum ReferrerPolicyValue: string
{
    /**
     * DEFAULT: Send a full URL when performing a same-origin request, only send
     * the origin when the protocol security level stays the same (HTTPS→HTTPS),
     * and send no header to a less secure destination (HTTPS→HTTP).
     */
    case strictOriginWhenCrossOrigin = "strict-origin-when-cross-origin";
    /**
     * means that the Referer header will not be sent.
     */
    case noReferrer = "no-referrer";
    /**
     * The Referer header will not be sent to origins without TLS (HTTPS).
     */
    case noReferrerWhenDowngrade = "no-referrer-when-downgrade";
    /**
     * The sent referrer will be limited to the origin of the referring page:
     * its scheme, host, and port.
     */
    case origin = "origin";
    /**
     * The referrer sent to other origins will be limited to the scheme, the
     * host, and the port. Navigations on the same origin will still include the
     * path.
     */
    case originWhenCrossOrigin = "origin-when-cross-origin";
    /**
     * A referrer will be sent for same origin, but cross-origin requests will
     * contain no referrer information.
     */
    case sameOrigin = "same-origin";
    /**
     * Only send the origin of the document as the referrer when the protocol
     * security level stays the same (HTTPS→HTTPS), but don't send it to a less
     * secure destination (HTTPS→HTTP).
     */
    case strictOrigin = "strict-origin";
    /**
     * The referrer will include the origin and the path (but not the fragment,
     * password, or username). THIS VALUE IS UNSAFE, because it leaks origins
     * and paths from TLS-protected resources to insecure origins. 
     */
    case unsafeUrl = "unsafe-url";
}