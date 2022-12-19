<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\ContentCategories\SectioningRoot;
use ByJoby\HTML\Tags\ContainerTagInterface;

interface BodyTagInterface extends ContainerTagInterface, SectioningRoot, FlowContent
{
}
