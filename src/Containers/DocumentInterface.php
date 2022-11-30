<?php

namespace ByJoby\HTML\Containers;

use ByJoby\HTML\ContainerInterface;
use ByJoby\HTML\Containers\DocumentTags\BodyTagInterface;
use ByJoby\HTML\Containers\DocumentTags\DoctypeInterface;
use ByJoby\HTML\Containers\DocumentTags\HeadTagInterface;
use ByJoby\HTML\Containers\DocumentTags\HtmlTagInterface;

interface DocumentInterface extends ContainerInterface
{
    public function doctype(): DoctypeInterface;
    public function html(): HtmlTagInterface;
    public function head(): HeadTagInterface;
    public function body(): BodyTagInterface;
}
