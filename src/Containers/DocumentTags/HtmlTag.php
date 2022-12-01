<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use ByJoby\HTML\Tags\AbstractContainerTag;

class HtmlTag extends AbstractContainerTag implements HtmlTagInterface
{
    /** @var HeadTagInterface */
    protected $head;
    /** @var BodyTagInterface */
    protected $body;

    public function __construct()
    {
        parent::__construct();
        $this->head = (new HeadTag)->setParent($this);
        $this->body = (new BodyTag)->setParent($this);
    }

    public function children(): array
    {
        return [
            $this->head(),
            $this->body()
        ];
    }

    public function tag(): string
    {
        return 'html';
    }

    public function head(): HeadTagInterface
    {
        return $this->head;
    }

    public function body(): BodyTagInterface
    {
        return $this->body;
    }
}
