<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\SectioningContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

class ArticleTag extends AbstractContainerTag implements DisplayBlock, SectioningContent
{
    const TAG = 'article';
}
