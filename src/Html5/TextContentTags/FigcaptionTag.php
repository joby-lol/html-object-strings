<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <figcaption> HTML element represents a caption or legend describing the
 * rest of the contents of its parent <figure> element.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figcaption
 */
class FigcaptionTag extends AbstractContainerTag implements FlowContent, DisplayBlock
{
    const TAG = 'figcaption';
}
