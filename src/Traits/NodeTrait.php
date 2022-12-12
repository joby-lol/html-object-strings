<?php

namespace ByJoby\HTML\Traits;

use ByJoby\HTML\ContainerInterface;
use ByJoby\HTML\Containers\DocumentInterface;
use ByJoby\HTML\NodeInterface;
use ByJoby\HTML\Tags\TagInterface;
use DeepCopy\DeepCopy;

trait NodeTrait
{
    /** @var null|ContainerInterface */
    protected $parent;

    abstract function __toString();

    public function parent(): null|ContainerInterface
    {
        return $this->parent;
    }

    public function setParent(null|ContainerInterface $parent): static
    {
        $this->parent = $parent;
        return $this;
    }

    public function parentTag(): null|TagInterface
    {
        return $this->parentOfType(TagInterface::class); // @phpstan-ignore-line
    }

    public function parentDocument(): null|DocumentInterface
    {
        return $this->parentOfType(DocumentInterface::class); // @phpstan-ignore-line
    }

    public function parentOfType(string $class): mixed
    {
        if ($this->parent() instanceof $class) {
            return $this->parent();
        } elseif ($this->parent() && $this->parent() instanceof NodeInterface) {
            return $this->parent()->parentOfType($class);
        } else {
            return null;
        }
    }

    public function detachCopy(): static
    {
        static $copier;
        $copier = $copier ?? new DeepCopy();
        return ($copier->copy($this))
            ->setParent(null);
    }
}
