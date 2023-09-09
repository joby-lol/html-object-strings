<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\Tags\AbstractContainerTag;

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
