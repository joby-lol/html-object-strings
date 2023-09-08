<?php

namespace ByJoby\HTML\Html5\DocumentTags;

use ByJoby\HTML\Containers\ContainerGroup;
use ByJoby\HTML\Containers\DocumentTags\BodyTagInterface;
use ByJoby\HTML\Containers\DocumentTags\HeadTagInterface;
use ByJoby\HTML\Containers\DocumentTags\HtmlTagInterface;
use ByJoby\HTML\Tags\AbstractGroupedTag;
use ByJoby\HTML\Traits\GroupedContainerTrait;

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
