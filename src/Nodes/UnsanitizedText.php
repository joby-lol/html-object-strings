<?php

namespace ByJoby\HTML\Nodes;

use ByJoby\HTML\Traits\NodeTrait;
use Stringable;

class UnsanitizedText implements TextInterface
{
    use NodeTrait;

    public function __construct(protected Stringable|string $value)
    {
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
