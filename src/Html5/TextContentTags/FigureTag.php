<?php

/**
 * Joby's HTML Object Strings: https://code.byjoby.com/html-object-strings/
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

namespace Joby\HTML\Html5\TextContentTags;

use Joby\HTML\Containers\ContainerGroup;
use Joby\HTML\NodeInterface;
use Joby\HTML\Tags\AbstractGroupedTag;
use Joby\HTML\Tags\TagInterface;

/**
 * The <figure> HTML element represents self-contained content, potentially with
 * an optional caption, which is specified using the <figcaption> element. The
 * figure, its caption, and its contents are referenced as a single unit.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figure
 */
class FigureTag extends AbstractGroupedTag
{
    const TAG = 'figure';

    public function __construct()
    {
        parent::__construct();
        // group that accepts anything but a figcaption tag
        $this->addGroup(new ContainerGroup(function (NodeInterface $node): bool {
            if ($node instanceof TagInterface) {
                return $node->tag() != 'figcaption';
            } else {
                return true;
            }
        }));
        // figcaption tag group
        $this->addGroup(ContainerGroup::ofTag('figcaption', 1));
    }

    /**
     * Flip the caption and content order from its current state. The default
     * state is to have the content first, then the caption.
     *
     * @return static
     */
    public function flipCaptionOrder(): self
    {
        $this->children = array_reverse($this->children);
        return $this;
    }
}
