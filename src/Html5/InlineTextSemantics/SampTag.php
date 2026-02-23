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
 * The <samp> HTML element is used to enclose inline text which represents
 * sample (or quoted) output from a computer program. Its contents are typically
 * rendered using the browser's default monospaced font (such as Courier or
 * Lucida Console).
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/samp
 */
class SampTag extends AbstractContainerTag
{
    const TAG = 'samp';
}