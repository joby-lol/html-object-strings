<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\ContentCategories\SectioningContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

class PTag extends AbstractContainerTag implements DisplayBlock, SectioningContent
{
    const TAG = 'p';
}
