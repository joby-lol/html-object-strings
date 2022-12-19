<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\ContentCategories\SectioningContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

class DivTag extends AbstractContainerTag implements DisplayBlock, SectioningContent
{
    const TAG = 'div';
}
