<?php

namespace ByJoby\HTML\Tags;

use ByJoby\HTML\Traits\ContainerMutableTrait;
use ByJoby\HTML\Traits\ContainerTagTrait;
use ByJoby\HTML\Traits\ContainerTrait;
use ByJoby\HTML\Traits\TagTrait;
use ByJoby\HTML\Traits\NodeTrait;

abstract class AbstractContainerTag implements ContainerTagInterface
{
    use NodeTrait, TagTrait;
    use ContainerTrait, ContainerMutableTrait;
    use ContainerTagTrait {
        ContainerTagTrait::__toString insteadof TagTrait;
    }

    public function tag(): string
    {
        return static::TAG; //@phpstan-ignore-line
    }
}
