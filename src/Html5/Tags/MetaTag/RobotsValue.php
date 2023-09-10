<?php

namespace ByJoby\HTML\Html5\Tags\MetaTag;

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