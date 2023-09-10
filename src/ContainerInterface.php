<?php

namespace ByJoby\HTML;

use Stringable;

interface ContainerInterface extends Stringable
{
    /** @return array<int,NodeInterface> */
    public function children(): array;

    public function contains(
        NodeInterface|Stringable|string $child
    ): bool;

    public function addChild(
        NodeInterface|Stringable|string $child,
        bool $prepend = false,
        bool $skip_sanitize = false
    ): self;

    public function removeChild(
        NodeInterface|Stringable|string $child
    ): self;

    public function addChildBefore(
        NodeInterface|Stringable|string $new_child,
        NodeInterface|Stringable|string $before_child,
        bool $skip_sanitize = false
    ): self;

    public function addChildAfter(
        NodeInterface|Stringable|string $new_child,
        NodeInterface|Stringable|string $after_child,
        bool $skip_sanitize = false
    ): self;
}
