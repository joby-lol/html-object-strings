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
 * The <figcaption> HTML element represents a caption or legend describing the
 * rest of the contents of its parent <figure> element.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figcaption
 */
class FigcaptionTag extends AbstractContainerTag
{
    const TAG = 'figcaption';
}
