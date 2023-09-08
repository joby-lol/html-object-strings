<?php

namespace ByJoby\HTML\Html5\Enums;

/**
 * A browsing context is an environment in which a browser displays a Document.
 * In modern browsers, it usually is a tab, but can be a window or even only
 * parts of a page, like a frame or an iframe.
 *
 * Descriptions by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Glossary/Browsing_context
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a
 */
enum BrowsingContext: string {
    /**
     * the current browsing context. (Default)
     */
    case current = "_self";
    /**
     * usually a new tab, but users can configure browsers to open a new window
     * instead.
     */
    case blank = "_blank";
    /**
     * the parent browsing context of the current one. If no parent, behaves as
     * _self.
     */
    case parent = "_parent";
    /**
     * the topmost browsing context (the "highest" context that's an ancestor of
     * the current one). If no ancestors, behaves as _self.
     */
    case top = "_top";
}