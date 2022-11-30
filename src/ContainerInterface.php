<?php

namespace ByJoby\HTML;

use Stringable;
use Traversable;

interface ContainerInterface extends Stringable
{
    /** @return array<int,NodeInterface> */
    public function children(): array;
}
