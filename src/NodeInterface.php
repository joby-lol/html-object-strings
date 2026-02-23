<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML;

use Joby\HTML\Containers\DocumentInterface;
use Joby\HTML\Tags\TagInterface;
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
