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
 * The <menu> HTML element is described in the HTML specification as a semantic
 * alternative to <ul>, but treated by browsers (and exposed through the
 * accessibility tree) as no different than <ul>. It represents an unordered
 * list of items (which are represented by <li> elements).
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/menu
 */
class MenuTag extends AbstractContainerTag
{
    const TAG = 'menu';
}
