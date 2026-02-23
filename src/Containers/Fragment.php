<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Containers;

use Joby\HTML\NodeInterface;
use Joby\HTML\Traits\ContainerTrait;
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
