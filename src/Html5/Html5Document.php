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

namespace Joby\HTML\Html5;

use Joby\HTML\Containers\ContainerGroup;
use Joby\HTML\Containers\DocumentTags\BodyTagInterface;
use Joby\HTML\Containers\DocumentTags\DoctypeInterface;
use Joby\HTML\Containers\DocumentTags\HeadTagInterface;
use Joby\HTML\Containers\DocumentTags\HtmlTagInterface;
use Joby\HTML\Containers\HtmlDocumentInterface;
use Joby\HTML\Html5\DocumentTags\Doctype;
use Joby\HTML\Html5\DocumentTags\HtmlTag;
use Joby\HTML\Traits\GroupedContainerTrait;

class Html5Document implements HtmlDocumentInterface
{
    use GroupedContainerTrait;

    /** @var ContainerGroup<DoctypeInterface> */
    protected $doctype;
    /** @var ContainerGroup<HtmlTagInterface> */
    protected $html;

    public function __construct()
    {
        $this->doctype = ContainerGroup::ofClass(DoctypeInterface::class, 1);
        $this->html = ContainerGroup::ofClass(HtmlTagInterface::class, 1);
        $this->addGroup($this->doctype);
        $this->addGroup($this->html);
        $this->addChild(new Doctype());
        $this->addChild(new HtmlTag());
    }

    public function doctype(): DoctypeInterface
    {
        return $this->doctype->children()[0];
    }

    public function html(): HtmlTagInterface
    {
        return $this->html->children()[0];
    }

    public function head(): HeadTagInterface
    {
        return $this->html()->head();
    }

    public function body(): BodyTagInterface
    {
        return $this->html()->body();
    }

    public function __toString(): string
    {
        return implode(
            PHP_EOL,
            array_filter(
                $this->groups(),
                function (ContainerGroup $group) {
                    return !!$group->children();
                }
            )
        );
    }
}
