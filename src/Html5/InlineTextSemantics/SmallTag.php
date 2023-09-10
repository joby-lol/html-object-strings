<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <small> HTML element represents side-comments and small print, like
 * copyright and legal text, independent of its styled presentation. By default,
 * it renders text within it one font-size smaller, such as from small to
 * x-small.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/small
 */
class SmallTag extends AbstractContainerTag
{
    const TAG = 'small';
}