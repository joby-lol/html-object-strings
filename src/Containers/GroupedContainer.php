<?php

namespace ByJoby\HTML\Containers;

use ByJoby\HTML\ContainerInterface;
use ByJoby\HTML\NodeInterface;
use ByJoby\HTML\Traits\GroupedContainerTrait;
use ByJoby\HTML\Traits\NodeTrait;

class GroupedContainer implements ContainerInterface, NodeInterface
{
    use NodeTrait;
    use GroupedContainerTrait;

    public function __toString(): string
    {
        return implode(
            PHP_EOL,
            array_filter(
                $this->groups(),
                function (ContainerGroup $group) {
                    return !!$group->children();
                }
            )
        );
    }
}
