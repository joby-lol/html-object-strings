<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\DocumentTags;

use Joby\HTML\Containers\DocumentTags\BodyTagInterface;
use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <body> HTML element represents the content of an HTML document. There can
 * be only one <body> element in a document.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/body
 */
class BodyTag extends AbstractContainerTag implements BodyTagInterface
{
    const TAG = 'body';
}
