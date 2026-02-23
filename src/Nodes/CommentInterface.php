<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Nodes;

use Joby\HTML\NodeInterface;
use Stringable;

interface CommentInterface extends NodeInterface
{
    public function __construct(Stringable|string $value);
    public function value(): string;

    public function setValue(string|Stringable $value): static;
}
