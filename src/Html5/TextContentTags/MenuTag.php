<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <menu> HTML element is described in the HTML specification as a semantic
 * alternative to <ul>, but treated by browsers (and exposed through the
 * accessibility tree) as no different than <ul>. It represents an unordered
 * list of items (which are represented by <li> elements).
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/menu
 */
class MenuTag extends AbstractContainerTag implements FlowContent, DisplayBlock
{
    const TAG = 'menu';
}
