<?php

namespace ByJoby\HTML;

use ByJoby\HTML\Containers\DocumentInterface;
use Stringable;

interface NodeInterface extends Stringable
{
    public function parent(): null|NodeInterface;

    public function setParent(
        null|NodeInterface $parent
    ): static;

    public function document(): null|DocumentInterface;

    public function setDocument(
        null|DocumentInterface $parent
    ): static;

    public function detach(): static;
}
