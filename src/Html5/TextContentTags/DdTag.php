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
 * The <dd> HTML element provides the description, definition, or value for the
 * preceding term (<dt>) in a description list (<dl>).
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dd
 */
class DdTag extends AbstractContainerTag
{
    const TAG = 'dd';
}
