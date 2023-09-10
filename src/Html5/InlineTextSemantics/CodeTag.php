<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;

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