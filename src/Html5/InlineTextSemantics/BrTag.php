<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Tags\AbstractTag;

/**
 * The <br> HTML element produces a line break in text (carriage-return). It is
 * useful for writing a poem or an address, where the division of lines is
 * significant.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/br
 */
class BrTag extends AbstractTag
{
    const TAG = 'br';
}