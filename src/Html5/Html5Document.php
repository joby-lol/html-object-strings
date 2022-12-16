<?php

namespace ByJoby\HTML\Html5;

use ByJoby\HTML\Containers\ContainerGroup;
use ByJoby\HTML\Containers\DocumentTags\BodyTagInterface;
use ByJoby\HTML\Containers\DocumentTags\DoctypeInterface;
use ByJoby\HTML\Containers\DocumentTags\HeadTagInterface;
use ByJoby\HTML\Containers\DocumentTags\HtmlTagInterface;
use ByJoby\HTML\Containers\HtmlDocumentInterface;
use ByJoby\HTML\Html5\DocumentTags\Doctype;
use ByJoby\HTML\Html5\DocumentTags\HtmlTag;
use ByJoby\HTML\Traits\GroupedContainerTrait;

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
        $this->addChild(new Doctype);
        $this->addChild(new HtmlTag);
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
