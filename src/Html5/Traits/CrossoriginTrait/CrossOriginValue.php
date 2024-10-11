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

namespace Joby\HTML\Html5\Traits\CrossoriginTrait;

enum CrossOriginValue: string
{
    /**
     * A cross-origin request (i.e. with an Origin HTTP header) is performed,
     * but no credential is sent (i.e. no cookie, X.509 certificate, or HTTP
     * Basic authentication). If the server does not give credentials to the
     * origin site (by not setting the Access-Control-Allow-Origin HTTP header)
     * the resource will be tainted and its usage restricted. 
     * 
     * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
     * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
     */
    case anonymous = 'anonymous';

    /**
     * A cross-origin request (i.e. with an Origin HTTP header) is performed
     * along with a credential sent (i.e. a cookie, certificate, and/or HTTP
     * Basic authentication is performed). If the server does not give
     * credentials to the origin site (through Access-Control-Allow-Credentials
     * HTTP header), the resource will be tainted and its usage restricted. 
     *
     * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
     * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
     */
    case useCredentials = 'use-credentials';
}