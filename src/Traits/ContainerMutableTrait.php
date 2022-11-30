<?php

namespace ByJoby\HTML\Traits;

use ByJoby\HTML\ContainerMutableInterface;
use ByJoby\HTML\NodeInterface;
use ByJoby\HTML\Nodes\Text;
use ByJoby\HTML\Nodes\UnsanitizedText;
use Exception;
use Stringable;

trait ContainerMutableTrait
{
    use ContainerTrait;

    public function addChild(
        NodeInterface|Stringable|string $child,
        bool $prepend = false,
        bool $skip_sanitize = false
    ): static {
        $child = $this->normalizeChild($child, $skip_sanitize);
        if ($this instanceof NodeInterface) {
            $child->detach();
            $child->setParent($this);
            $child->setDocument($this->document());
        }
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
                if (is_object($child)) return $e !== $child;
                else return $e != $child;
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
        $new_child = $this->normalizeChild($new_child, $skip_sanitize);
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
        $new_child = $this->normalizeChild($new_child, $skip_sanitize);
        array_splice($this->children, $i + 1, 0, [$new_child]);
        return $this;
    }

    protected function normalizeChild(NodeInterface|Stringable|string $child, bool $skip_sanitize): NodeInterface
    {
        if ($child instanceof NodeInterface) {
            return $child;
        } else {
            if ($skip_sanitize) return new UnsanitizedText($child);
            else return new Text($child);
        }
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
