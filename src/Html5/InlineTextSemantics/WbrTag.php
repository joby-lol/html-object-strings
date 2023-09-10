<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractTag;

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