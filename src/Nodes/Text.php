<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Nodes;

use Joby\HTML\Traits\NodeTrait;
use Stringable;

class Text implements TextInterface
{
    use NodeTrait;

    public function __construct(protected Stringable|string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }

    public function setValue(string|Stringable $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function __toString(): string
    {
        return htmlentities(strip_tags($this->value()));
    }
}
