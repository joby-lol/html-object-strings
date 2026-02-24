<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML;

use Generator;
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

    /**
     * Detach all child nodes from this object.
     */
    public function clearChildren(): static;

    /**
     * Walk the entire tree from this object, yielding all child Nodes recursively. Optionally filtered to only Nodes of a particular class, and also optionally stopping traversal into any classes specified in $stop_at.
     * 
     * @template WalkNodeType of NodeInterface
     * @param class-string<WalkNodeType>|null $of_class
     * @param array<class-string<NodeInterface>> $stop_at
     * @return ($of_class is null ? Generator<NodeInterface> : Generator<WalkNodeType>)
     */
    public function walk(string|null $of_class = null, array $stop_at = []): Generator;
}
