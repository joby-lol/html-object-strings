<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\MetadataContent;
use ByJoby\HTML\ContentCategories\PhrasingContent;
use ByJoby\HTML\DisplayTypes\DisplayContents;
use ByJoby\HTML\Tags\AbstractContentTag;

/**
 * 
 * 
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * 
 */
class NoscriptTag extends AbstractContentTag implements MetadataContent, PhrasingContent, DisplayContents
{
    const TAG = 'noscript';
}
