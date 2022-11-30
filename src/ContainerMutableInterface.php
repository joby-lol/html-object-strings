<?php

namespace ByJoby\HTML;

use Stringable;

interface ContainerMutableInterface extends ContainerInterface
{
    public function addChild(
        NodeInterface|Stringable|string $child,
        bool $prepend = false,
        bool $skip_sanitize = false
    ): static;

    public function removeChild(
        NodeInterface|Stringable|string $child
    ): static;

    public function addChildBefore(
        NodeInterface|Stringable|string $new_child,
        NodeInterface|Stringable|string $before_child,
        bool $skip_sanitize = false
    ): static;

    public function addChildAfter(
        NodeInterface|Stringable|string $new_child,
        NodeInterface|Stringable|string $after_child,
        bool $skip_sanitize = false
    ): static;
}
