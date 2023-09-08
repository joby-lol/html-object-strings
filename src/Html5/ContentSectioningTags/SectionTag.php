<?php

namespace ByJoby\HTML\Html5\ContentSectioningTags;

use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\ContentCategories\SectioningContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <section> HTML element represents a generic standalone section of a
 * document, which doesn't have a more specific semantic element to represent
 * it. Sections should always have a heading, with very few exceptions.
 * 
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/section
 */
class SectionTag extends AbstractContainerTag implements DisplayBlock, FlowContent, SectioningContent
{
    const TAG = 'section';
}
