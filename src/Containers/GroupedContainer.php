<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Containers;

use Joby\HTML\ContainerInterface;
use Joby\HTML\NodeInterface;
use Joby\HTML\Traits\GroupedContainerTrait;
use Joby\HTML\Traits\NodeTrait;

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
