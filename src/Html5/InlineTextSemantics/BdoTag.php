<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <bdo> HTML element overrides the current directionality of text, so that
 * the text within is rendered in a different direction.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/bdo
 */
class BdoTag extends AbstractContainerTag
{
    const TAG = 'bdo';
}