<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <strong> HTML element indicates that its contents have strong importance,
 * seriousness, or urgency. Browsers typically render the contents in bold type.
 *
 * The <strong> element is for content that is of "strong importance," including
 * things of great seriousness or urgency (such as warnings). This could be a
 * sentence that is of great importance to the whole page, or you could merely
 * try to point out that some words are of greater importance compared to nearby
 * content.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/strong
 */
class StrongTag extends AbstractContainerTag
{
    const TAG = 'strong';
}