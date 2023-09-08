<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <dl> HTML element represents a description list. The element encloses a
 * list of groups of terms (specified using the <dt> element) and descriptions
 * (provided by <dd> elements). Common uses for this element are to implement a
 * glossary or to display metadata (a list of key-value pairs).
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dl
 */
class DlTag extends AbstractContainerTag implements FlowContent, DisplayBlock
{
    const TAG = 'dl';
}
