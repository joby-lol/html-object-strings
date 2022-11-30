<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use ByJoby\HTML\Tags\ContainerTagInterface;

interface HeadTagInterface extends ContainerTagInterface
{
    public function title(): TitleTagInterface;
}
