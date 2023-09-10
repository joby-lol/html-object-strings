<?php

namespace ByJoby\HTML\Traits;

use ByJoby\HTML\Containers\ContainerGroup;
use ByJoby\HTML\NodeInterface;
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
