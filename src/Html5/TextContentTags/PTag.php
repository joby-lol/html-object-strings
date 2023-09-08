<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\ContentCategories\SectioningContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <p> HTML element represents a paragraph. Paragraphs are usually
 * represented in visual media as blocks of text separated from adjacent blocks
 * by blank lines and/or first-line indentation, but HTML paragraphs can be any
 * structural grouping of related content, such as images or form fields.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/p
 */
class PTag extends AbstractContainerTag implements DisplayBlock, SectioningContent
{
    const TAG = 'p';
}
