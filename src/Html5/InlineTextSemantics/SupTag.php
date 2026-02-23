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
 * The <sup> HTML element specifies inline text which is to be displayed as
 * superscript for solely typographical reasons. Superscripts are usually
 * rendered with a raised baseline using smaller text.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/sup
 */
class SupTag extends AbstractContainerTag
{
    const TAG = 'sup';
}