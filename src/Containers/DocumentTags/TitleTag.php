<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use ByJoby\HTML\Tags\AbstractContainerTag;
use ByJoby\HTML\Traits\NodeTrait;
use Exception;

class TitleTag implements TitleTagInterface
{
    use NodeTrait;

    /** @var string */
    protected $title = 'Untitled';

    public function setTitle(string $title): static
    {
        $this->title = trim(strip_tags($title));
        return $this;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function detach(): static
    {
        throw new Exception('Not allowed to detach TitleTag');
    }

    public function __toString(): string
    {
        return '<title>' . $this->title() . '</title>';
    }
}
