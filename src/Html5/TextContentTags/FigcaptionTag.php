<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

class FigcaptionTag extends AbstractContainerTag implements FlowContent, DisplayBlock
{
    const TAG = 'figcaption';
}
