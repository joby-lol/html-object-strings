<?php

namespace ByJoby\HTML\Containers;

use ByJoby\HTML\Containers\DocumentTags\BodyTagInterface;
use ByJoby\HTML\Containers\DocumentTags\Doctype;
use ByJoby\HTML\Containers\DocumentTags\DoctypeInterface;
use ByJoby\HTML\Containers\DocumentTags\HeadTagInterface;
use ByJoby\HTML\Containers\DocumentTags\HtmlTag;
use ByJoby\HTML\Containers\DocumentTags\HtmlTagInterface;
use ByJoby\HTML\Traits\ContainerTrait;

class GenericHtmlDocument implements HtmlDocumentInterface
{
    use ContainerTrait;

    /** @var DoctypeInterface */
    protected $doctype;
    /** @var HtmlTagInterface */
    protected $html;

    public function __construct()
    {
        $this->doctype = (new Doctype);
        $this->html = (new HtmlTag);
        $this->addChild($this->doctype);
        $this->addChild($this->html);
    }

    public function doctype(): DoctypeInterface
    {
        return $this->doctype;
    }

    public function html(): HtmlTagInterface
    {
        return $this->html;
    }

    public function head(): HeadTagInterface
    {
        return $this->html()->head();
    }

    public function body(): BodyTagInterface
    {
        return $this->html()->body();
    }

    public function children(): array
    {
        return [
            $this->doctype(),
            $this->html()
        ];
    }

    public function __toString(): string
    {
        return $this->doctype()
            . PHP_EOL
            . $this->html();
    }
}
