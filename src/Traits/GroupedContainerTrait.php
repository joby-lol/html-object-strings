<?php

/**
 * Joby's HTML Object Strings: https://code.byjoby.com/html-object-strings/
 * MIT License: Copyright (c) 2024 Joby Elliott
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE 
 * SOFTWARE.
 */

namespace Joby\HTML\Traits;

use Joby\HTML\Containers\ContainerGroup;
use Joby\HTML\NodeInterface;
use Stringable;

/**
 * @method bool containsGroup(ContainerGroup $group)
 * @method static addGroup(ContainerGroup $group, bool $prepend=false, bool $skip_sanitize=false)
 */
trait GroupedContainerTrait
{
    use ContainerTrait {
        ContainerTrait::contains as containsGroup;
        ContainerTrait::addChild as addGroup;
        ContainerTrait::removeChild as removeGroup;
        ContainerTrait::addChildBefore as addGroupBefore;
        ContainerTrait::addChildAfter as addGroupAfter;
    }

    /**
     * @return array<int,ContainerGroup<NodeInterface>>
     */
    public function groups(): array
    {
        return array_filter(
            $this->children,
            function (NodeInterface $node) {
                return $node instanceof ContainerGroup;
            }
        );
    }

    public function willAccept(NodeInterface|Stringable|string $child): bool
    {
        foreach ($this->groups() as $group) {
            if ($group->willAccept($child)) {
                return true;
            }
        }
        return false;
    }

    public function contains(
        NodeInterface|Stringable|string $child
    ): bool {
        foreach ($this->groups() as $group) {
            if ($group->contains($child)) {
                return true;
            }
        }
        return false;
    }

    public function addChild(
        NodeInterface|Stringable|string $child,
        bool $prepend = false,
        bool $skip_sanitize = false
    ): self {
        foreach ($this->groups() as $group) {
            if ($group->willAccept($child)) {
                $group->addChild($child, $prepend, $skip_sanitize);
                break;
            }
        }
        return $this;
    }

    public function removeChild(
        NodeInterface|Stringable|string $child
    ): self {
        foreach ($this->groups() as $group) {
            $group->removeChild($child);
        }
        return $this;
    }

    public function addChildBefore(
        NodeInterface|Stringable|string $new_child,
        NodeInterface|Stringable|string $before_child,
        bool $skip_sanitize = false
    ): self {
        foreach ($this->groups() as $group) {
            if ($group->willAccept($new_child) && $group->contains($before_child)) {
                $group->addChildBefore($new_child, $before_child, $skip_sanitize);
                break;
            }
        }
        return $this;
    }

    public function addChildAfter(
        NodeInterface|Stringable|string $new_child,
        NodeInterface|Stringable|string $after_child,
        bool $skip_sanitize = false
    ): self {
        foreach ($this->groups() as $group) {
            if ($group->willAccept($new_child) && $group->contains($after_child)) {
                $group->addChildAfter($new_child, $after_child, $skip_sanitize);
                break;
            }
        }
        return $this;
    }

    public function children(): array
    {
        /** @var array<int,NodeInterface> */
        $children = [];
        foreach ($this->groups() as $group) {
            foreach ($group->children() as $child) {
                $children[] = $child;
            }
        }
        return $children;
    }
}
