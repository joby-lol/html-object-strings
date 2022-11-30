<?php

namespace ByJoby\HTML\Nodes;

use ByJoby\HTML\NodeInterface;
use Stringable;

interface TextInterface extends NodeInterface
{
    public function __construct(Stringable|string $value);
}