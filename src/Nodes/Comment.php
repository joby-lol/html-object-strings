<?php

namespace ByJoby\HTML\Nodes;

use ByJoby\HTML\Traits\NodeTrait;
use Stringable;

class Comment implements CommentInterface
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
        return sprintf(
            '<!-- %s -->',
            str_replace(
                '--', // regular hyphens
                '‑‑', // non-breaking hyphens, so they can't end the comment
                $this->value()
            )
        );
    }
}
