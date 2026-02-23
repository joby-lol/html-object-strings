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
 * The <code> HTML element displays its contents styled in a fashion intended to
 * indicate that the text is a short fragment of computer code. By default, the
 * content text is displayed using the user agent's default monospace font.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/code
 */
class CodeTag extends AbstractContainerTag
{

    const TAG = 'code';

}
