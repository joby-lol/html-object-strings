<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <pre> HTML element represents preformatted text which is to be presented
 * exactly as written in the HTML file. The text is typically rendered using a
 * non-proportional, or monospaced, font. Whitespace inside this element is
 * displayed as written.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/pre
 */
class PreTag extends AbstractContainerTag implements DisplayBlock
{
    const TAG = 'pre';
}
