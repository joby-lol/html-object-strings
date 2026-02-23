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
 * The <i> HTML element represents a range of text that is set off from the
 * normal text for some reason, such as idiomatic text, technical terms,
 * taxonomical designations, among others. Historically, these have been
 * presented using italicized type, which is the original source of the <i>
 * naming of this element.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/i
 */
class ITag extends AbstractContainerTag
{
    const TAG = 'i';
}