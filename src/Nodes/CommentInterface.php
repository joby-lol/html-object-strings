<?php

namespace ByJoby\HTML\Nodes;

use ByJoby\HTML\NodeInterface;
use Stringable;

interface CommentInterface extends NodeInterface
{
    public function __construct(Stringable|string $value);
}
