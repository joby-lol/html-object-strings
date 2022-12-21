<?php

namespace ByJoby\HTML\Containers;

use ByJoby\HTML\NodeInterface;
use ByJoby\HTML\Traits\ContainerTrait;
use Stringable;
use Traversable;

class Fragment implements FragmentInterface
{
    use ContainerTrait;

    /**
     * @param null|array<mixed,string|Stringable|NodeInterface>|Traversable<mixed,string|Stringable|NodeInterface>|null $children
     */
    public function __construct(null|array|Traversable $children = null)
    {
        if (!$children) {
            return;
        }
        foreach ($children as $child) {
            $this->addChild($child);
        }
    }

    public function __toString(): string
    {
        return implode(PHP_EOL, $this->children());
    }
}
