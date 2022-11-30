<?php

namespace ByJoby\HTML\Containers;

use ByJoby\HTML\Traits\ContainerMutableTrait;
use ByJoby\HTML\Traits\ContainerTrait;

class Fragment implements FragmentInterface
{
    use ContainerTrait;
    use ContainerMutableTrait;

    public function __toString(): string
    {
        return implode(PHP_EOL, $this->children());
    }
}
