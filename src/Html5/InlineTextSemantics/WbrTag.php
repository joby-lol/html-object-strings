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
 * The <wbr> HTML element represents a word break opportunity—a position within
 * text where the browser may optionally break a line, though its line-breaking
 * rules would not otherwise create a break at that location.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/wbr
 */
class WbrTag extends AbstractTag
{
    // TODO figure out a way to make tags like this prefer having no whitespace added around them
    const TAG = 'wbr';
}