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
 * The <cite> HTML element is used to mark up the title of a cited creative
 * work. The reference may be in an abbreviated form according to
 * context-appropriate conventions related to citation metadata.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/cite
 */
class CiteTag extends AbstractContainerTag
{
    const TAG = 'cite';
}