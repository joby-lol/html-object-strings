<?php

namespace ByJoby\HTML\Containers;

use ByJoby\HTML\ContainerInterface;
use ByJoby\HTML\NodeInterface;
use ByJoby\HTML\Tags\TagInterface;
use ByJoby\HTML\Traits\ContainerTrait;
use ByJoby\HTML\Traits\NodeTrait;
use Stringable;

/**
 * @template T of NodeInterface
 * @method array<int,T> children()
 */
class ContainerGroup implements ContainerInterface, NodeInterface
{
    use NodeTrait;
    use ContainerTrait {
        ContainerTrait::contains as doContains;
        ContainerTrait::addChild as doAddChild;
        ContainerTrait::addChildBefore as doAddChildBefore;
        ContainerTrait::addChildAfter as doAddChildAfter;
    }

    /** @var callable */
    protected $validator;
    /** @var int */
    protected $limit = 0;

    /**
     * @param int $limit 
     * @return ContainerGroup<NodeInterface>
     */
    public static function catchAll(int $limit = 0): ContainerGroup
    {
        return new ContainerGroup(
            function () {
                return true;
            },
            $limit
        );
    }

    /**
     * @template C of T
     * @param class-string<C> $class 
     * @param int $limit 
     * @return ContainerGroup<C>
     */
    public static function ofClass(string $class, int $limit = 0): ContainerGroup
    {
        return new ContainerGroup( // @phpstan-ignore-line
            function (NodeInterface $child) use ($class): bool {
                return $child instanceof $class;
            },
            $limit
        );
    }

    /**
     * @param string $tag
     * @param int $limit 
     * @return ContainerGroup<TagInterface>
     */
    public static function ofTag(string $tag, int $limit = 0): ContainerGroup
    {
        return new ContainerGroup( // @phpstan-ignore-line
            function (NodeInterface $child) use ($tag): bool {
                if ($child instanceof TagInterface) {
                    return $child->tag() == $tag;
                } else {
                    return false;
                }
            },
            $limit
        );
    }

    public function addChild(NodeInterface|Stringable|string $child, bool $prepend = false, bool $skip_sanitize = false): static
    {
        if ($this->willAccept($child)) {
            $this->doAddChild($child, $prepend, $skip_sanitize);
            $this->enforceChildLimit($prepend);
        }
        return $this;
    }

    public function addChildAfter(NodeInterface|Stringable|string $new_child, NodeInterface|Stringable|string $after_child, bool $skip_sanitize = false): static
    {
        if ($this->willAccept($new_child)) {
            $this->doAddChildAfter($new_child, $after_child, $skip_sanitize);
            $this->enforceChildLimit(false);
        }
        return $this;
    }

    public function addChildBefore(NodeInterface|Stringable|string $new_child, NodeInterface|Stringable|string $before_child, bool $skip_sanitize = false): static
    {
        if ($this->willAccept($new_child)) {
            $this->doAddChildBefore($new_child, $before_child, $skip_sanitize);
            $this->enforceChildLimit(true);
        }
        return $this;
    }

    protected function enforceChildLimit(bool $remove_from_end): void
    {
        if ($this->limit > 0) {
            while (count($this->children) > $this->limit) {
                if ($remove_from_end) {
                    $child = array_pop($this->children);
                } else {
                    $child = array_shift($this->children);
                }
                $child->setParent(null);
            }
        }
    }

    public function willAccept(NodeInterface|Stringable|string $child): bool
    {
        if ($child instanceof NodeInterface) {
            $child = $child->detachCopy();
        }
        $child = $this->prepareChildToAdd($child, false);
        return !!call_user_func($this->validator, $child);
    }

    public function __construct(callable $validator, int $limit = 0)
    {
        $this->validator = $validator;
        $this->limit = $limit;
    }

    public function __toString(): string
    {
        return implode(PHP_EOL, $this->children());
    }
}
