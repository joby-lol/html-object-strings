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
 * The <sub> HTML element specifies inline text which should be displayed as
 * subscript for solely typographical reasons. Subscripts are typically rendered
 * with a lowered baseline using smaller text.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/sub
 */
class SubTag extends AbstractContainerTag
{
    const TAG = 'sub';
}