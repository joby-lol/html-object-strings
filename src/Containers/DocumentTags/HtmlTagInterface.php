<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use ByJoby\HTML\ContainerInterface;
use ByJoby\HTML\Tags\TagInterface;

interface HtmlTagInterface extends ContainerInterface, TagInterface
{
    public function head(): HeadTagInterface;
    public function body(): BodyTagInterface;
}
