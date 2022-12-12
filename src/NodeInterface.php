<?php

namespace ByJoby\HTML;

use ByJoby\HTML\Containers\DocumentInterface;
use ByJoby\HTML\Tags\TagInterface;
use Stringable;

interface NodeInterface extends Stringable
{
    public function parent(): null|ContainerInterface;

    public function setParent(
        null|ContainerInterface $parent
    ): static;

    public function parentTag(): null|TagInterface;

    public function parentDocument(): null|DocumentInterface;

    /**
     * @template T of NodeInterface
     * @param class-string<T> $class
     * @return null|T
     */
    public function parentOfType(string $class): mixed;

    public function detachCopy(): static;
}
