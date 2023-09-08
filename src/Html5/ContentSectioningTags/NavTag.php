<?php

namespace ByJoby\HTML\Html5\ContentSectioningTags;

use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\ContentCategories\SectioningContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <nav> HTML element represents a section of a page whose purpose is to
 * provide navigation links, either within the current document or to other
 * documents. Common examples of navigation sections are menus, tables of
 * contents, and indexes.
 * 
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/nav
 */
class NavTag extends AbstractContainerTag implements DisplayBlock, FlowContent, SectioningContent
{
    const TAG = 'nav';
}
