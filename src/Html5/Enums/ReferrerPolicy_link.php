<?php

namespace ByJoby\HTML\Html5\Enums;

/**
 * A string indicating which referrer to use when fetching the resource. These
 * values are valid in <link> elements.
 *
 * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
 */
enum ReferrerPolicy_link: string
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