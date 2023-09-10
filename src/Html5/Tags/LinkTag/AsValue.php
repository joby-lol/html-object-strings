<?php

namespace ByJoby\HTML\Html5\Tags\LinkTag;

/**
 * This attribute is required when rel="preload" has been set on the <link>
 * element, optional when rel="modulepreload" has been set, and otherwise should
 * not be used. It specifies the type of content being loaded by the <link>,
 * which is necessary for request matching, application of correct content
 * security policy, and setting of correct Accept request header. 
 *
 * Furthermore, rel="preload" uses this as a signal for request prioritization.
 * The value comments list the valid values for this attribute and the elements
 * or resources they apply to.
 *
 * Descriptions by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
 */
enum AsValue: string {
    /**
     * Applies to <audio> elements
     */
    case audio = "audio";
    /**
     * Applies to <iframe> and <frame> elements
     */
    case document = "document";
    /**
     * Applies to <embed> elements
     */
    case embed = "embed";
    /**
     * Applies to fetch, XHR Note: This value also requires <link> to contain
     * the crossorigin attribute.
     */
    case fetch = "fetch";
    /**
     * Applies to CSS @font-face
     */
    case font = "font";
    /**
     * Applies to <img> and <picture> elements with srcset or imageset
     * attributes, SVG <image> elements, CSS *-image rules 
     */
    case image = "image";
    /**
     * Applies to <object> elements
     */
    case object = "object";
    /**
     * Applies to <script> elements, Worker importScripts
     */
    case script = "script";
    /**
     * Applies to <link rel=stylesheet> elements, CSS @import
     */
    case style = "style";
    /**
     * Applies to <track> elements
     */
    case track = "track";
    /**
     * Applies to <video> elements
     */
    case video = "video";
    /**
     * Applies to Worker, SharedWorker
     */
    case worker = "worker";
}