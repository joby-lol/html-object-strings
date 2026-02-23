<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Tags\AbstractContainerTag;

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