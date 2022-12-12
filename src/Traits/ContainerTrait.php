<?php

namespace ByJoby\HTML\Traits;

use ByJoby\HTML\NodeInterface;
use ByJoby\HTML\Nodes\Text;
use ByJoby\HTML\Nodes\UnsanitizedText;
use Exception;
use Stringable;

trait ContainerTrait
{
    /** @var array<int,NodeInterface> */
    protected $children = [];

    /** @return array<int,NodeInterface> */
    public function children(): array
    {
        return $this->children;
    }

    public function addChild(
        NodeInterface|Stringable|string $child,
        bool $prepend = false,
        bool $skip_sanitize = false
    ): static {
        $child = $this->prepareChildToAdd($child, $skip_sanitize);
        if ($prepend) array_unshift($this->children, $child);
        else $this->children[] = $child;
        return $this;
    }

    public function removeChild(
        NodeInterface|Stringable|string $child
    ): static {
        $this->children = array_filter(
            $this->children,
            function (NodeInterface $e) use ($child) {
                if (is_object($child)) $keep = $e !== $child;
                else $keep = $e != $child;
                if (!$keep) {
                    $e->setParent(null);
                }
                return $keep;
            }
        );
        return $this;
    }

    public function addChildBefore(
        NodeInterface|Stringable|string $new_child,
        NodeInterface|Stringable|string $before_child,
        bool $skip_sanitize = false
    ): static {
        $i = $this->indexOfChild($before_child);
        if ($i === null) {
            throw new Exception('Reference child not found in this container');
        }
        $new_child = $this->prepareChildToAdd($new_child, $skip_sanitize);
        array_splice($this->children, $i, 0, [$new_child]);
        return $this;
    }

    public function addChildAfter(
        NodeInterface|Stringable|string $new_child,
        NodeInterface|Stringable|string $after_child,
        bool $skip_sanitize = false
    ): static {
        $i = $this->indexOfChild($after_child);
        if ($i === null) {
            throw new Exception('Reference child not found in this container');
        }
        $new_child = $this->prepareChildToAdd($new_child, $skip_sanitize);
        array_splice($this->children, $i + 1, 0, [$new_child]);
        return $this;
    }

    protected function prepareChildToAdd(NodeInterface|Stringable|string $child, bool $skip_sanitize): NodeInterface
    {
        // turn strings into nodes
        if (!($child instanceof NodeInterface)) {
            if ($skip_sanitize) $child = new UnsanitizedText($child);
            else $child = new Text($child);
        }
        // remove from parent, move it here, and return
        if ($parent = $child->parent()) {
            $parent->removeChild($child);
        }
        $child->setParent($this);
        return $child;
    }

    protected function indexOfChild(NodeInterface|Stringable|string $child): null|int
    {
        if ($child instanceof NodeInterface) {
            foreach ($this->children() as $i => $v) {
                if ($v === $child) return $i;
            }
        } else {
            foreach ($this->children() as $i => $v) {
                if ($v == $child) return $i;
            }
        }
        return null;
    }
}
