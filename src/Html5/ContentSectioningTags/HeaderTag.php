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
 * The <header> HTML element represents introductory content, typically a group
 * of introductory or navigational aids. It may contain some heading elements
 * but also a logo, a search form, an author name, and other elements.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/header
 */
class HeaderTag extends AbstractContainerTag
{
    const TAG = 'header';
}
