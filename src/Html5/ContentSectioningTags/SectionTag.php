<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\ContentSectioningTags;

use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <section> HTML element represents a generic standalone section of a
 * document, which doesn't have a more specific semantic element to represent
 * it. Sections should always have a heading, with very few exceptions.
 * 
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/section
 */
class SectionTag extends AbstractContainerTag
{
    const TAG = 'section';
}
