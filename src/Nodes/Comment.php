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

    public function __toString(): string
    {
        return sprintf(
            '<!-- %s -->',
            str_replace(
                '--', // regular hyphens
                '‑‑', // non-breaking hyphens
                $this->value
            )
        );
    }
}
