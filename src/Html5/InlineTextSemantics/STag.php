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
 * The <s> HTML element renders text with a strikethrough, or a line through it.
 * Use the <s> element to represent things that are no longer relevant or no
 * longer accurate. However, <s> is not appropriate when indicating document
 * edits; for that, use the <del> and <ins> elements, as appropriate.
 *
 * Accessibility concerns: The presence of the s element is not announced by
 * most screen reading technology in its default configuration. It can be made
 * to be announced by using the CSS content property, along with the ::before
 * and ::after pseudo-elements.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/s
 */
class STag extends AbstractContainerTag
{
    const TAG = 's';
}