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

namespace Joby\HTML\Html5\Tags\MetaTag;

/**
 * the behavior that cooperative crawlers, or "robots", should use. Meant to be
 * used in MetaTag::setRobots
 *
 * Descriptions by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta/name
 */
enum RobotsValue: string {
    /**
     * Allows the robot to index the page (default).
     */
    case index = "index";
    /**
     * Requests the robot to not index the page.
     */
    case noIndex = "noindex";
    /**
     * Allows the robot to follow the links on the page (default).
     */
    case follow = "follow";
    /**
     * Requests the robot to not follow the links on the page.
     */
    case noFollow = "nofollow";
    /**
     * Equivalent to index, follow
     */
    case all = "all";
    /**
     * Equivalent to noindex, nofollow
     */
    case none = "none";
    /**
     * Requests the search engine not to cache the page content.
     */
    case noArchive = "noarchive";
    /**
     * Prevents displaying any description of the page in search engine results.
     */
    case noSnippet = "nosnippet";
    /**
     * Requests this page not to appear as the referring page of an indexed
     * image.
     */
    case noImageIndex = "noimageindex";
}