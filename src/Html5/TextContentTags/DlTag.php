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
 * The <dl> HTML element represents a description list. The element encloses a
 * list of groups of terms (specified using the <dt> element) and descriptions
 * (provided by <dd> elements). Common uses for this element are to implement a
 * glossary or to display metadata (a list of key-value pairs).
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dl
 */
class DlTag extends AbstractContainerTag
{
    const TAG = 'dl';
}
