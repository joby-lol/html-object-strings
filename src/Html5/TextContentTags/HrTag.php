<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractTag;

class HrTag extends AbstractTag implements FlowContent, DisplayBlock
{
    const TAG = 'hr';
}
