<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\HeadingContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

class HgroupTag extends AbstractContainerTag implements DisplayBlock, HeadingContent
{
    const TAG = 'hgroup';
}
