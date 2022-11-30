<?php

namespace ByJoby\HTML\Traits;

use ByJoby\HTML\ContainerInterface;
use ByJoby\HTML\ContainerMutableInterface;
use ByJoby\HTML\Containers\DocumentInterface;
use ByJoby\HTML\NodeInterface;
use DeepCopy\DeepCopy;
use Exception;

trait NodeTrait
{
    /** @var null|NodeInterface */
    protected $parent;
    /** @var null|DocumentInterface */
    protected $document;

    abstract function __toString();

    public function parent(): null|NodeInterface
    {
        return $this->parent;
    }

    public function setParent(null|NodeInterface $parent): static
    {
        $this->parent = $parent;
        return $this;
    }

    public function document(): null|DocumentInterface
    {
        return $this->document;
    }

    public function setDocument(null|DocumentInterface $document): static
    {
        $this->document = $document;
        if ($this instanceof ContainerInterface) {
            foreach ($this->children() as $child) {
                $child->setDocument($document);
            }
        }
        return $this;
    }

    public function detach(): static
    {
        if (!$this->parent()) return $this;
        if ($this->parent() instanceof ContainerMutableInterface) {
            $this->parent()->removeChild($this);
        } else {
            throw new Exception('Cannot detach() a Node from a parent that is not a ContainerMutableInterface, use detachCopy() instead');
        }
        $this->setParent(null);
        $this->setDocument(null);
        return $this;
    }

    public function detachCopy(): static
    {
        static $copier;
        $copier = $copier ?? new DeepCopy();
        return ($copier->copy($this))
            ->setParent(null)
            ->setDocument(null);
    }
}
