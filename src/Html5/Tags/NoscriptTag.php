<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\MetadataContent;
use ByJoby\HTML\ContentCategories\PhrasingContent;
use ByJoby\HTML\DisplayTypes\DisplayContents;
use ByJoby\HTML\Tags\AbstractContentTag;

class NoscriptTag extends AbstractContentTag implements MetadataContent, PhrasingContent, DisplayContents
{
    const TAG = 'noscript';
}
