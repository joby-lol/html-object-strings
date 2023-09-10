<?php

namespace ByJoby\HTML\Html5\Tags\ScriptTag;

/**
 * A string indicating which referrer to use when fetching the resource. These
 * values are valid in <script> elements.
 *
 * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script
 */
enum ReferrerPolicyValue: string
{
    /**
     * (default): Send a full URL when performing a same-origin request, only
     * send the origin when the protocol security level stays the same
     * (HTTPS→HTTPS), and send no header to a less secure destination
     * (HTTPS→HTTP).
     */
    case strictOriginWhenCrossOrigin = "strict-origin-when-cross-origin";
    /**
     * means that the Referer header will not be sent.
     */
    case noReferrer = "no-referrer";
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
     * password, or username). This value is unsafe, because it leaks origins
     * and paths from TLS-protected resources to insecure origins.
     */
    case unsafeUrl = "unsafe-url";
}