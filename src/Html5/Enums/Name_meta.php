<?php

namespace ByJoby\HTML\Html5\Enums;

/**
 * Includes a selection of standard metadata names defined in the HTML and CSS standards as well as the WHATWG Wiki MetaExtensions page.
 *
 * Descriptions by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta/name
 */
enum Name_meta: string
{
    /**
     * the name of the application running in the web page. 
     */
    case application = "application-name";
    /**
     * the name of the document's author.
     */
    case author = "author";
    /**
     * a short and accurate summary of the content of the page. Several browsers, like Firefox and Opera, use this as the default description of bookmarked pages.
     */
    case description = "description";
    /**
     * the identifier of the software that generated the page.
     */
    case generator = "generator";
    /**
     * words relevant to the page's content separated by commas.
     */
    case keywords = "keywords";
    /**
     * controls the HTTP Referer header of requests sent from the document
     */
    case referrer = "referrer";
    /**
     * indicates a suggested color that user agents should use to customize the display of the page or of the surrounding user interface. The content attribute contains a valid CSS <color>. The media attribute with a valid media query list can be included to set the media the theme color metadata applies to.
     */
    case color = "theme-color";
    /**
     * specifies one or more color schemes with which the document is
     * compatible. The browser will use this information in tandem with the
     * user's browser or device settings to determine what colors to use for
     * everything from background and foregrounds to form controls and
     * scrollbars. The primary use for <meta name="color-scheme"> is to indicate
     * compatibility with—and order of preference for—light and dark color
     * modes. The value of the content property for color-scheme may be one of
     * the following: 
     * 
     * * normal
     * * only light
     * * light dark
     * * dark light
     */
    case colorScheme = "color-scheme";
    /**
     * Defines the pixel width of the viewport that you want the website to be rendered at.
     * 
     * Or set to "device-width" to set viewport to device width
     */
    case viewportWidth = "width";
    /**
     * Defines the ratio between the device width (device-width in portrait mode or device-height in landscape mode) and the viewport size.
     * 
     * Value: 0.0-10.0
     */
    case initialScale = "initial-scale";
    /**
     * Defines the maximum amount to zoom in. It must be greater or equal to the minimum-scale or the behavior is undefined. Browser settings can ignore this rule and iOS10+ ignores it by default. 
     * 
     * Value: 0.0-10.0
     */
    case maximumScale = "maximum-scale";
    /**
     * Defines the minimum zoom level. It must be smaller or equal to the maximum-scale or the behavior is undefined. Browser settings can ignore this rule and iOS10+ ignores it by default. 
     * 
     * Value: 0.0-10.0
     */
    case minimumScale = "minimum-scale";
    /**
     * the behavior that cooperative crawlers, or "robots", should use with the page. It is a comma-separated list of the values in Robots_meta
     */
    case robots = "robots";
}