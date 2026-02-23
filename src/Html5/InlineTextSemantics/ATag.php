<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Html5\Traits\HyperlinkTrait;
use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <a> HTML element (or anchor element), with its href attribute, creates a
 * hyperlink to web pages, files, email addresses, locations in the same page,
 * or anything else a URL can address.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a
 */
class ATag extends AbstractContainerTag
{
    use HyperlinkTrait;
    const TAG = 'a';
}