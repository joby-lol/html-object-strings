<?php

namespace ByJoby\HTML\Html5\ContentSectioningTags;

use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\ContentCategories\SectioningContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <aside> HTML element represents a portion of a document whose content is
 * only indirectly related to the document's main content. Asides are frequently
 * presented as sidebars or call-out boxes.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/aside
 */
class AsideTag extends AbstractContainerTag implements DisplayBlock, FlowContent, SectioningContent
{
    const TAG = 'aside';
}
