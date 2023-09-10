<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;

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