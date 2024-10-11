<?php

/**
 * Joby's HTML Object Strings: https://go.joby.lol/htmlobjectstrings
 * MIT License: Copyright (c) 2024 Joby Elliott
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE 
 * SOFTWARE.
 */

namespace Joby\HTML\Traits;

use Joby\HTML\NodeInterface;
use Joby\HTML\Nodes\Text;
use Joby\HTML\Nodes\UnsanitizedText;
use Exception;
use Stringable;

trait ContainerTrait
{
    /** @var array<int,NodeInterface> */
    protected $children = [];

    /** @return array<int,NodeInterface> */
    public function children(): array
    {
        return $this->children;
    }

    public function contains(
        NodeInterface|Stringable|string $child
    ): bool {
        if ($child instanceof NodeInterface) {
            return $child->parent() === $this;
        } else {
            return $this->indexOfChild($child) !== null;
        }
    }

    public function addChild(
        NodeInterface|Stringable|string $child,
        bool $prepend = false,
        bool $skip_sanitize = false
    ): static {
        $child = $this->prepareChildToAdd($child, $skip_sanitize);
        if ($prepend) {
            array_unshift($this->children, $child);
        } else {
            $this->children[] = $child;
        }
        return $this;
    }

    public function removeChild(
        NodeInterface|Stringable|string $child
    ): static {
        $this->children = array_filter(
            $this->children,
            function (NodeInterface $e) use ($child) {
                if (is_object($child)) {
                    $keep = $e !== $child;
                } else {
                    $keep = $e != $child;
                }
                if (!$keep) {
                    $e->setParent(null);
                }
                return $keep;
            }
        );
        return $this;
    }

    public function addChildBefore(
        NodeInterface|Stringable|string $new_child,
        NodeInterface|Stringable|string $before_child,
        bool $skip_sanitize = false
    ): static {
        $i = $this->indexOfChild($before_child);
        if ($i === null) {
            throw new Exception('Reference child not found in this container');
        }
        $new_child = $this->prepareChildToAdd($new_child, $skip_sanitize);
        array_splice($this->children, $i, 0, [$new_child]);
        return $this;
    }

    public function addChildAfter(
        NodeInterface|Stringable|string $new_child,
        NodeInterface|Stringable|string $after_child,
        bool $skip_sanitize = false
    ): static {
        $i = $this->indexOfChild($after_child);
        if ($i === null) {
            throw new Exception('Reference child not found in this container');
        }
        $new_child = $this->prepareChildToAdd($new_child, $skip_sanitize);
        array_splice($this->children, $i + 1, 0, [$new_child]);
        return $this;
    }

    protected function prepareChildToAdd(NodeInterface|Stringable|string $child, bool $skip_sanitize): NodeInterface
    {
        // turn strings into nodes
        if (!($child instanceof NodeInterface)) {
            if ($skip_sanitize) {
                $child = new UnsanitizedText($child);
            } else {
                $child = new Text($child);
            }
        }
        // remove from parent, move it here, and return
        if ($parent = $child->parent()) {
            $parent->removeChild($child);
        }
        $child->setParent($this);
        return $child;
    }

    protected function indexOfChild(NodeInterface|Stringable|string $child): null|int
    {
        if ($child instanceof NodeInterface) {
            foreach ($this->children as $i => $v) {
                if ($v === $child) {
                    return $i;
                }
            }
        } else {
            foreach ($this->children as $i => $v) {
                if ($v == $child) {
                    return $i;
                }
            }
        }
        return null;
    }
}
