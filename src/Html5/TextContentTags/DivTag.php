<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\TextContentTags;

use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <div> HTML element is the generic container for flow content. It has no
 * effect on the content or layout until styled in some way using CSS (e.g.
 * styling is directly applied to it, or some kind of layout model like Flexbox
 * is applied to its parent element).
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/div
 */
class DivTag extends AbstractContainerTag
{
    const TAG = 'div';
}
