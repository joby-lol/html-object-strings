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
 * The <mark> HTML element represents text which is marked or highlighted for
 * reference or notation purposes due to the marked passage's relevance in the
 * enclosing context.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/mark
 */
class MarkTag extends AbstractContainerTag
{
    const TAG = 'mark';
}