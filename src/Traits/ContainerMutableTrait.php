<?php

namespace ByJoby\HTML\Traits;

use ByJoby\HTML\ContainerMutableInterface;
use ByJoby\HTML\NodeInterface;
use ByJoby\HTML\Nodes\Text;
use ByJoby\HTML\Nodes\UnsanitizedText;
use Stringable;

trait ContainerMutableTrait
{
    use ContainerTrait;

    public function addChild(
        NodeInterface|Stringable|string $child,
        bool $prepend = false,
        bool $skip_sanitize = false
    ): static {
        if (!($child instanceof NodeInterface)) {
            if ($skip_sanitize) $child = new UnsanitizedText($child);
            else $child = new Text($child);
        }
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
                if ($child instanceof NodeInterface) return $e !== $child;
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
        return $this;
    }

    public function addChildAfter(
        NodeInterface|Stringable|string $new_child,
        NodeInterface|Stringable|string $after_child,
        bool $skip_sanitize = false
    ): static {
        return $this;
    }
}
