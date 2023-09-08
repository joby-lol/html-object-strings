<?php

namespace ByJoby\HTML\Html5\ContentSectioningTags;

use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <header> HTML element represents introductory content, typically a group
 * of introductory or navigational aids. It may contain some heading elements
 * but also a logo, a search form, an author name, and other elements.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/header
 */
class HeaderTag extends AbstractContainerTag implements DisplayBlock, FlowContent
{
    const TAG = 'header';
}
