<?php

namespace ByJoby\HTML\Html5\Enums;

/**
 * Defines a pragma directive. The attribute is named http-equiv(alent) because
 * all the allowed values are names of particular HTTP headers.
 *
 * Descriptions by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta#http-equiv
 */
enum HttpEquiv_meta: string {
    /**
     * Allows page authors to define a content policy for the current page.
     * Content policies mostly specify allowed server origins and script
     * endpoints which help guard against cross-site scripting attacks. 
     */
    case ContentSecurityPolicy = "content-security-policy";
    /**
     * Declares the MIME type and the document's character encoding. The content
     * attribute must have the value "text/html; charset=utf-8" if specified.
     * This is equivalent to a <meta> element with the charset attribute
     * specified and carries the same restriction on placement within the
     * document. Note: Can only be used in documents served with a text/html —
     * not in documents served with an XML MIME type. 
     */
    case mime = "content-type";
    /**
     * Sets the name of the default CSS style sheet set.
     */
    case defaultStyle = "default-style";
    /**
     * If specified, the content attribute must have the value "IE=edge". User
     * agents are required to ignore this pragma. 
     */
    case xUaCompatible = "x-ua-compatible";
    /**
     * This instruction specifies:
     *
     * The number of seconds until the page should be reloaded - only if the
     * content attribute contains a non-negative integer.
     *
     * The number of seconds until the page should redirect to another - only if
     * the content attribute contains a non-negative integer followed by the
     * string ';url=', and a valid URL.
     */
    case refresh = "refresh";
}