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
 * The <nav> HTML element represents a section of a page whose purpose is to
 * provide navigation links, either within the current document or to other
 * documents. Common examples of navigation sections are menus, tables of
 * contents, and indexes.
 * 
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/nav
 */
class NavTag extends AbstractContainerTag
{
    const TAG = 'nav';
}
