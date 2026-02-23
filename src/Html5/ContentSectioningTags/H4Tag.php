<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\ContentSectioningTags;

/**
 * The <h1> to <h6> HTML elements represent six levels of section headings. <h1>
 * is the highest section level and <h6> is the lowest. By default, all heading
 * elements create a block-level box in the layout, starting on a new line and
 * taking up the full width available in their containing block.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements
 */
class H4Tag extends AbstractHeaderTag
{
    const TAG = 'h4';
}
