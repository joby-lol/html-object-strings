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
 * The rel attribute defines the relationship between a linked resource and the
 * current document. These values are valid in <link> elements.
 *
 * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/rel
 */
enum RelValue: string
{
    /** 
     * Alternate representations of the current document.
     */
    case alternate = "alternate";
    /** 
     * Author of the current document or article.
     */
    case author = "author";
    /** 
     * Preferred URL for the current document.
     */
    case canonical = "canonical";
    /** 
     * Tells the browser to preemptively perform DNS resolution for the target
     * resource's origin.
     */
    case dnsPrefetch = "dns-prefetch";
    /** 
     * Link to context-sensitive help.
     */
    case help = "help";
    /** 
     * An icon representing the current document.
     */
    case icon = "icon";
    /** 
     * Indicates that the main content of the current document is covered by the
     * copyright license. described by the referenced document.
     */
    case license = "license";
    /** 
     * Web app manifest.
     */
    case manifest = "manifest";
    /** 
     * Indicates that the current document represents the person who owns the
     * linked content.
     */
    case me = "me";
    /** 
     * Tells to browser to preemptively fetch the script and store it in the
     * document's module map for later evaluation. Optionally, the module's
     * dependencies can be fetched as well.
     */
    case modulePreload = "modulepreload";
    /** 
     * Indicates that the current document is a part of a series and that the
     * next document in the series is the referenced document.
     */
    case next = "next";
    /** 
     * Gives the address of the pingback server that handles pingbacks to the
     * current document.
     */
    case pingback = "pingback";
    /** 
     * Specifies that the user agent should preemptively connect to the target
     * resource's origin.
     */
    case preconnect = "preconnect";
    /** 
     * Specifies that the user agent should preemptively fetch and cache the
     * target resource as it is likely to be required for a followup navigation.
     * */
    case prefetch = "prefetch";
    /** 
     * Specifies that the user agent must preemptively fetch and cache the
     * target resource for current navigation according to the potential
     * destination given by the as attribute (and the priority associated with
     * the corresponding destination).
     */
    case preload = "preload";
    /**
     * Specifies that the user agent should preemptively fetch the target
     * resource and process it in a way that helps deliver a faster response in
     * the future.
     */
    case prerender = "prerender";
    /**
     * Indicates that the current document is a part of a series and that the
     * previous document in the series is the referenced document.
     */
    case previous = "prev";
    /**
     * Gives a link to a resource that can be used to search through the current
     * document and its related pages.
     */
    case search = "search";
    /**
     * Imports a style sheet.
     */
    case stylesheet = "stylesheet";
}