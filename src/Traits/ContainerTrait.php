<?php

namespace ByJoby\HTML\Traits;

use ByJoby\HTML\NodeInterface;

trait ContainerTrait
{
    /** @var array<int,NodeInterface> */
    protected $children = [];

    /** @return array<int,NodeInterface> */
    public function children(): array
    {
        return $this->children;
    }
}
