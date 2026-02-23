<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\TextContentTags;

use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <p> HTML element represents a paragraph. Paragraphs are usually
 * represented in visual media as blocks of text separated from adjacent blocks
 * by blank lines and/or first-line indentation, but HTML paragraphs can be any
 * structural grouping of related content, such as images or form fields.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/p
 */
class PTag extends AbstractContainerTag
{
    const TAG = 'p';
}
