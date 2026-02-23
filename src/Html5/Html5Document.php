<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
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
