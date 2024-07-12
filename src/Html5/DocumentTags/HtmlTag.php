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

namespace Joby\HTML\Html5\DocumentTags;

use Joby\HTML\Containers\ContainerGroup;
use Joby\HTML\Containers\DocumentTags\BodyTagInterface;
use Joby\HTML\Containers\DocumentTags\HeadTagInterface;
use Joby\HTML\Containers\DocumentTags\HtmlTagInterface;
use Joby\HTML\Tags\AbstractGroupedTag;
use Joby\HTML\Traits\GroupedContainerTrait;

/**
 * The <html> HTML element represents the root (top-level element) of an HTML
 * document, so it is also referred to as the root element. All other elements
 * must be descendants of this element.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/html
 */
class HtmlTag extends AbstractGroupedTag implements HtmlTagInterface
{
    use GroupedContainerTrait;

    const TAG = 'html';

    /** @var ContainerGroup<HeadTagInterface> */
    protected $head;
    /** @var ContainerGroup<BodyTagInterface> */
    protected $body;

    public function __construct()
    {
        parent::__construct();
        $this->head = ContainerGroup::ofClass(HeadTagInterface::class, 1);
        $this->body = ContainerGroup::ofClass(BodyTagInterface::class, 1);
        $this->addGroup($this->head);
        $this->addGroup($this->body);
        $this->addChild(new HeadTag());
        $this->addChild(new BodyTag());
    }

    public function head(): HeadTagInterface
    {
        return $this->head->children()[0];
    }

    public function body(): BodyTagInterface
    {
        return $this->body->children()[0];
    }
}
