<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use ByJoby\HTML\Tags\AbstractContainerTag;

class HeadTag extends AbstractContainerTag implements HeadTagInterface
{
    /** @var TitleTagInterface */
    protected $title;

    public function __construct()
    {
        parent::__construct();
        $this->title = (new TitleTag);
        $this->addChild($this->title);
    }

    public function title(): TitleTagInterface
    {
        return $this->title;
    }

    public function tag(): string
    {
        return 'head';
    }
}
