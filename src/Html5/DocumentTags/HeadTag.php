<?php

namespace ByJoby\HTML\Html5\DocumentTags;

use ByJoby\HTML\Containers\ContainerGroup;
use ByJoby\HTML\Containers\DocumentTags\HeadTagInterface;
use ByJoby\HTML\Containers\DocumentTags\TitleTagInterface;
use ByJoby\HTML\Tags\AbstractGroupedTag;
use ByJoby\HTML\Traits\GroupedContainerTrait;

class HeadTag extends AbstractGroupedTag implements HeadTagInterface
{
    use GroupedContainerTrait;

    const TAG = 'head';

    /** @var ContainerGroup<TitleTagInterface> */
    protected $title;

    public function __construct()
    {
        parent::__construct();
        $this->title = ContainerGroup::ofClass(TitleTagInterface::class, 1);
        $this->addGroup($this->title);
        $this->addChild(new TitleTag());
        $this->addGroup(ContainerGroup::ofTag('meta'));
        $this->addGroup(ContainerGroup::ofTag('base', 1));
        $this->addGroup(ContainerGroup::ofTag('style'));
        $this->addGroup(ContainerGroup::ofTag('script'));
        $this->addGroup(ContainerGroup::ofTag('noscript'));
        $this->addGroup(ContainerGroup::ofTag('template', 1));
        $this->addGroup(ContainerGroup::catchAll());
    }

    public function title(): TitleTagInterface
    {
        return $this->title->children()[0];
    }
}
