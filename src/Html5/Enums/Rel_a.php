<?php

namespace ByJoby\HTML\Html5\Enums;

/**
 * The rel attribute defines the relationship between a linked resource and the
 * current document. These values are valid in <a> and <area> elements.
 *
 * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/rel
 */
enum Rel_a: string
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
     * Permalink for the nearest ancestor section.
     */
    case bookmark = "bookmark";
    /**
     * The referenced document is not part of the same site as the current
     * document.
     */
    case external = "external";
    /** 
     * Link to context-sensitive help.
     */
    case help = "help";
    /** 
     * Indicates that the main content of the current document is covered by the
     * copyright license. described by the referenced document.
     */
    case license = "license";
    /** 
     * Indicates that the current document represents the person who owns the
     * linked content.
     */
    case me = "me";
    /** 
     * Indicates that the current document is a part of a series and that the
     * next document in the series is the referenced document.
     */
    case next = "next";
    /**
     * Indicates that the current document's original author or publisher does
     * not endorse the referenced document.
     */
    case noFollow = "nofollow";
    /**
     * Creates a top-level browsing context that is not an auxiliary browsing
     * context if the hyperlink would create either of those, to begin with
     * (i.e., has an appropriate target attribute value).
     */
    case noOpener = "noopener";
    /**
     * No Referer header will be included. Additionally, has the same effect as
     * noopener.
     */
    case noReferrer = "noreferrer";
    /**
     * Creates an auxiliary browsing context if the hyperlink would otherwise
     * create a top-level browsing context that is not an auxiliary browsing
     * context (i.e., has "_blank" as target attribute value).
     */
    case opener = "opener";
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
     * Gives a tag (identified by the given address) that applies to the current
     * document.
     */
    case tag = "tag";
}